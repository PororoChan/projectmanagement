<div class="col-lg-3 col-md-4 add">
    <div id="row" class="board-portlet bg-white shadow p-3 rounded">
        <button class="btn btn-inverse-secondary w-100" style="height: 40px;" id="add_list">
            <i class="fas fa-plus fs-7 me-2"></i>
            <span class="text-center font-weight-bold">Add List</span>
        </button>
        <div class="mt-4 w-100" style="height: max-content;" id="list-append">

        </div>
    </div>
</div>
<?= $this->include('master/imp/list') ?>