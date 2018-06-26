<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateLocationStatusRequest;
use App\Http\Requests\UpdateLocationStatusRequest;
use App\Repositories\LocationStatusRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\LocationStatus;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LocationStatusController extends InfyOmBaseController
{
    /** @var  LocationStatusRepository */
    private $locationStatusRepository;

    public function __construct(LocationStatusRepository $locationStatusRepo)
    {
        $this->locationStatusRepository = $locationStatusRepo;
    }

    /**
     * Display a listing of the LocationStatus.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->locationStatusRepository->pushCriteria(new RequestCriteria($request));
        $locationStatuses = $this->locationStatusRepository->all();
        return view('admin.locationStatuses.index')
            ->with('locationStatuses', $locationStatuses);
    }

    /**
     * Show the form for creating a new LocationStatus.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.locationStatuses.create');
    }

    /**
     * Store a newly created LocationStatus in storage.
     *
     * @param CreateLocationStatusRequest $request
     *
     * @return Response
     */
    public function store(CreateLocationStatusRequest $request)
    {
        $input = $request->all();

        $locationStatus = $this->locationStatusRepository->create($input);

        Flash::success('LocationStatus saved successfully.');

        return back();
    }

    /**
     * Display the specified LocationStatus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $locationStatus = $this->locationStatusRepository->findWithoutFail($id);

        if (empty($locationStatus)) {
            Flash::error('LocationStatus not found');

            return redirect(route('locationStatuses.index'));
        }

        return view('admin.locationStatuses.show')->with('locationStatus', $locationStatus);
    }

    /**
     * Show the form for editing the specified LocationStatus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $locationStatus = $this->locationStatusRepository->findWithoutFail($id);

        if (empty($locationStatus)) {
            Flash::error('LocationStatus not found');

            return redirect(route('locationStatuses.index'));
        }

        return view('admin.locationStatuses.edit')->with('locationStatus', $locationStatus);
    }

    /**
     * Update the specified LocationStatus in storage.
     *
     * @param  int              $id
     * @param UpdateLocationStatusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLocationStatusRequest $request)
    {
        $locationStatus = $this->locationStatusRepository->findWithoutFail($id);

        

        if (empty($locationStatus)) {
            Flash::error('LocationStatus not found');

            return redirect(route('locationStatuses.index'));
        }

        $locationStatus = $this->locationStatusRepository->update($request->all(), $id);

        Flash::success('LocationStatus updated successfully.');

        return redirect(route('admin.locationStatuses.index'));
    }

    /**
     * Remove the specified LocationStatus from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.locationStatuses.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = LocationStatus::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.locationStatuses.index'))->with('success', Lang::get('message.success.delete'));

       }

}
