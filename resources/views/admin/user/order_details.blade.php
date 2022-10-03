  <!-- Modal Header -->
      <div class="modal-header">Order #{{ $order->id }} - Owner : {{ $order->products[0]->product->user->name }}</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          @include("admin.orders.order_tpl")
           
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

