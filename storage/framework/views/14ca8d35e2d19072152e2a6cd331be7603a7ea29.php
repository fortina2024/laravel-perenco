<style>

    .search-form {
        width: 350px;
        border-radius: 3px;
        float: left;
        height:auto;
    }

    .search-form .input-group{
        padding-top:0.825rem;
    }

    .search-form input[type="text"] {
        color: #666;
        height:2.3rem;
    }

    .search-form .btn {
        height:2.3rem;
        border-color:#ced4da;
    }

</style>

<form action="/admin/pages" method="get" class="search-form" pjax-container>
    <div class="input-group input-group-sm">
        <input type="text" name="title" class="form-control" placeholder="Search...">
        <button type="submit" name="search" id="search-btn" class="btn btn-outline-primary"><i class="icon-search"></i></button>
    </div>
</form><?php /**PATH C:\xampp\htdocs\perenco_asset_management\perenco_tracking\resources\views/admin/search-bar.blade.php ENDPATH**/ ?>