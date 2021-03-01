@extends('layout/structure')
@section('content')
<div class="content-main">
    <h1>add Inventory</h1>
    <hr>
    <form action="">
        <div class="form-group">
            <h4>
                <label for="select-product" class="form-label">Select Product</label>
            </h4>
            <select name="product" id="select-product" class="form-select form-select-lg" style="width: 50%">
                <option selected>----</option>
                <option value="INV-1">INV-1 - Battery</option>
                <option value="INV-1">INV-1 - PCB</option>
                <option value="INV-2">INV-2 - Pan</option>
            </select>
        </div>
    </form>
</div>
<script>


</script>
@endsection
