<?php

namespace App\Http\Controllers;

use App\File;
use App\Http\Requests;
use App\Http\Requests\CreateLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use App\Models\FileStatus;
use App\Models\LocationStatus;
use App\Repositories\LocationRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Location;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LocationController extends InfyOmBaseController
{
    /** @var  LocationRepository */
    private $locationRepository;

    public function __construct(LocationRepository $locationRepo)
    {
        $this->locationRepository = $locationRepo;
    }

    /**
     * Display a listing of the Location.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->locationRepository->pushCriteria(new RequestCriteria($request));
	    $locations = $this->locationRepository->with(['status','statuses'=>function($query){
	    	$query->orderBy('location_status.created_at','desc');
	    },'files'])->all();
	    if($request->ajax()){
	    	return $this->sendResponse($locations,"");
	    }
        return view('admin.locations.index')
            ->with('locations', $locations);
    }

    /**
     * Show the form for creating a new Location.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.locations.create');
    }

    /**
     * Store a newly created Location in storage.
     *
     * @param CreateLocationRequest $request
     *
     * @return Response
     */
    public function store(CreateLocationRequest $request)
    {
        $input = $request->all();

        $location = $this->locationRepository->create($input);

	    $update = new LocationStatus();
	    $update->location_id = $location->id;
	    $update->status_id = $location->status_id;
	    $update->name = 'Initial status';
	    $update->description = "";
	    $update->user_id = Sentinel::getUser()->id;
	    $update->save();

	    foreach ($input["file"] as $fileid){
		    $upload = File::find($fileid);
	    	$file = new FileStatus();
		    $file->location_id = $update->location_id;
		    $file->location_status_id = $update->id;
		    $file->file_id = $fileid;
		    $file->name = $upload->filename;
		    $file->save();
	    }

        Flash::success('Location saved successfully.');

        return redirect(route('admin.locations.index'));
    }

    /**
     * Display the specified Location.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $location = $this->locationRepository->findWithoutFail($id);

        if (empty($location)) {
            Flash::error('Location not found');

            return redirect(route('locations.index'));
        }

        return view('admin.locations.show')->with('location', $location);
    }

    /**
     * Show the form for editing the specified Location.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $location = $this->locationRepository->findWithoutFail($id);

        if (empty($location)) {
            Flash::error('Location not found');

            return redirect(route('locations.index'));
        }

        return view('admin.locations.edit')->with('location', $location);
    }

    /**
     * Update the specified Location in storage.
     *
     * @param  int              $id
     * @param UpdateLocationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLocationRequest $request)
    {
        $location = $this->locationRepository->findWithoutFail($id);

        if (empty($location)) {
            Flash::error('Location not found');

            return redirect(route('locations.index'));
        }

        $location = $this->locationRepository->update($request->all(), $id);

	    $update = new LocationStatus();
	    $update->location_id = $location->id;
	    $update->status_id = $location->status_id;
	    $update->name = 'Changed status';
	    $update->description = "";
	    $update->user_id = Sentinel::getUser()->id;
	    $update->save();

	    Flash::success('Location updated successfully.');

        return redirect(route('admin.locations.index'));
    }

    /**
     * Remove the specified Location from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.locations.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Location::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.locations.index'))->with('success', Lang::get('message.success.delete'));

       }

}
