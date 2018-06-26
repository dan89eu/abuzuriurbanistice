<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateFileStatusRequest;
use App\Http\Requests\UpdateFileStatusRequest;
use App\Repositories\FileStatusRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\FileStatus;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class FileStatusController extends InfyOmBaseController
{
    /** @var  FileStatusRepository */
    private $fileStatusRepository;

    public function __construct(FileStatusRepository $fileStatusRepo)
    {
        $this->fileStatusRepository = $fileStatusRepo;
    }

    /**
     * Display a listing of the FileStatus.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->fileStatusRepository->pushCriteria(new RequestCriteria($request));
        $fileStatuses = $this->fileStatusRepository->all();
        return view('admin.fileStatuses.index')
            ->with('fileStatuses', $fileStatuses);
    }

    /**
     * Show the form for creating a new FileStatus.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.fileStatuses.create');
    }

    /**
     * Store a newly created FileStatus in storage.
     *
     * @param CreateFileStatusRequest $request
     *
     * @return Response
     */
    public function store(CreateFileStatusRequest $request)
    {
        $input = $request->all();

        $fileStatus = $this->fileStatusRepository->create($input);

        Flash::success('FileStatus saved successfully.');

        return redirect(route('admin.fileStatuses.index'));
    }

    /**
     * Display the specified FileStatus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fileStatus = $this->fileStatusRepository->findWithoutFail($id);

        if (empty($fileStatus)) {
            Flash::error('FileStatus not found');

            return redirect(route('fileStatuses.index'));
        }

        return view('admin.fileStatuses.show')->with('fileStatus', $fileStatus);
    }

    /**
     * Show the form for editing the specified FileStatus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fileStatus = $this->fileStatusRepository->findWithoutFail($id);

        if (empty($fileStatus)) {
            Flash::error('FileStatus not found');

            return redirect(route('fileStatuses.index'));
        }

        return view('admin.fileStatuses.edit')->with('fileStatus', $fileStatus);
    }

    /**
     * Update the specified FileStatus in storage.
     *
     * @param  int              $id
     * @param UpdateFileStatusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFileStatusRequest $request)
    {
        $fileStatus = $this->fileStatusRepository->findWithoutFail($id);

        

        if (empty($fileStatus)) {
            Flash::error('FileStatus not found');

            return redirect(route('fileStatuses.index'));
        }

        $fileStatus = $this->fileStatusRepository->update($request->all(), $id);

        Flash::success('FileStatus updated successfully.');

        return redirect(route('admin.fileStatuses.index'));
    }

    /**
     * Remove the specified FileStatus from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
      public function getModalDelete($id = null)
      {
          $error = '';
          $model = '';
          $confirm_route =  route('admin.fileStatuses.delete',['id'=>$id]);
          return View('admin.layouts/modal_confirmation', compact('error','model', 'confirm_route'));

      }

       public function getDelete($id = null)
       {
           $sample = FileStatus::destroy($id);

           // Redirect to the group management page
           return redirect(route('admin.fileStatuses.index'))->with('success', Lang::get('message.success.delete'));

       }

}
