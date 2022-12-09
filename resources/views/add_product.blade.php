
<!-- Modal -->
<div class="modal fade" id="addeModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
<form method="post" action="" id="AddProductForm">
@csrf
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="addModalLabel">Add Products</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="errMsgContainer mb-2">

      </div>
        <div class="form-group mb-2">
          <label for="name">Product Name</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Input Product Name">
        </div>
        <div class="form-group">
          <label for="price">Product Price</label>
          <input type="text" class="form-control" name="price" id="price" placeholder="Input Product price">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_product">Save Product</button>
      </div>
    </div>
  </div>
  </div>
</div>
