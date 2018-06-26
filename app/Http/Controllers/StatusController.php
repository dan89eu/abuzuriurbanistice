<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Repositories\StatusRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Status;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class StatusController extends InfyOmBaseController
{
    /** @var  StatusRepository */
    private $statusRepository;

    public function __construct(StatusRepository $statusRepo)
    {
        $this->statusRepository = $statusRepo;
    }

    /**
     * Display a listing of the Status.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->statusRepository->pushCriteria(new RequestCriteria($request));
        $statuses = $this->statusRepository->all();
        return view('admin.statuses.index')
            ->with('statuses', $statuses);
    }

    /**
     * Show the form for creating a new Status.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.statuses.create');
    }

    /**
     * Store a newly created Status in storage.
     *
     * @param CreateStatusRequest $request
     *
     * @return Response
     */
    public function store(CreateStatusRequest $request)
    {
        $input = $request->all();

        $status = $this->statusRepository->create($input);

        Flash::success('Status saved successfully.');

        return redirect(route('admin.statuses.index'));
    }

    /**
     * Display the specified Status.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $status = $this->statusRepository->findWithoutFail($id);

        if (empty($status)) {
            Flash::error('Status not found');

            return redirect(route('statuses.index'));
        }

        return view('admin.statuses.show')->with('status', $status);
    }

    /**
     * Show the form for editing the specified Status.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $status = $this->statusRepository->findWithoutFail($id);

        if (empty($status)) {
            Flash::error('Status not found');

            return redirect(route('statuses.index'));
        }

        return view('admin.statuses.edit')->with('status', $status);
    }

    /**
     * Update the specified Status in storage.
     *
     * @param  int              $id
     * @param UpdateStatusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStatusRequest $request)
    {
        $status = $this->statusRepository->findWithoutFail($id);

        

        if (empty($status)) {
            Flash::error('Status not found');

            return redirect(route('statuses.index'));
        }

        $status = $this->statusRepository->update($request->all(), $id);

        Flash::success('Status updated successfully.');

        return redirect(route('admin.statuses.index'));
    }

    /**
     * Remove the specified Status from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.statuses.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = Status::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.statuses.index'))->with('success', Lang::get('message.success.delete'));

       }

}
