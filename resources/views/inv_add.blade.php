@extends('layout/structure')
@section('content')
<div class="content-main">
    <h1>add Inventory <span class="user-id">ID-USER #00001</span></h1>
    <hr>
    <form action="" class="form">
        <div class="input-group">
            <label for="type-product" class="form-label ml-auto p-2">Type</label>
            <select name="type-product" id="type-product" class="form-select form-select-lg">
                <option selected>----</option>
                <option value="JNS-1">Electric</option>
                <option value="JNS-2">Chemical</option>
                <option value="JNS-3"></option>
            </select>
            <label for="product-name" class="form-label ml-auto p-2">Name Product</label>
            <input type="text" name="product-name" id="product-name" class="form-control">
        </div>
        <div class="form-group">
            <label for="condition" class="form-label  ml-auto p-2">kondisi</label>
            <input type="text" id="condition" class="form-control">
        </div>
    </form>
</div>
<script>
</script>
@endsection
