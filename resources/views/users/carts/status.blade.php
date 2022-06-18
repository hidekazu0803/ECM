<div class="modal fade" id="purchase-item-{{ $cart->item->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-success">
            <div class="modal-header border-success">
                <h5 class="modal-title text-success">
                   <i class="fas fa-user-check"></i> Purchase
                </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               Do you want to purchase: {{  $cart->item->name }}
            </div>
            <div class="modal-footer">
                <form action="{{ route('carts.purchase',$cart->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    {{ $cart->id }}
                    <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success btn-sm">Purchase</button>

                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete-item-{{ $cart->item->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h5 class="modal-title text-danger">
                   <i class="fas fa-user-check"></i> Delete
                </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               Do you want to delete: {{  $cart->item->name }}
            </div>
            <div class="modal-footer">
                <form action="{{ route('carts.delete',$cart->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>

                </form>
            </div>
        </div>
    </div>
</div>
