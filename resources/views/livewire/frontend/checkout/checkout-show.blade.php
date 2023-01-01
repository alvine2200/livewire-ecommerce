<div>
    <div style="margin-bottom: 5rem; !important;" class="py-3 mt-5 py-md-4 checkout">
        <div class="container">
            <h4>Checkout</h4>
            <hr>
            @if ($totalProductsAmount > 0)
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="shadow bg-white p-3">
                            <h4 class="text-primary">
                                Item Total Amount :
                                <span class="float-end">${{ $totalProductsAmount }}</span>
                            </h4>
                            <hr>
                            <small>* Items will be delivered in 3 - 5 days.</small>
                            <br />
                            <small>* Tax and other charges are included ?</small>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="shadow bg-white p-3">
                            <h4 class="text-primary">
                                Basic Information
                            </h4>
                            <hr>

                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Full Name</label>
                                        <input type="text" id="fullname" wire:model.defer="fullname"
                                            class="form-control" placeholder="Enter Full Name" />
                                        @error('fullname')
                                            <small class="error text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Phone Number</label>
                                        <input type="number" id="phone_number" wire:model.defer="phone_number"
                                            class="form-control" placeholder="Enter Phone Number" />
                                        @error('phone_number')
                                            <small class="error text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Email Address</label>
                                        <input type="email" id="email" wire:model.defer="email"
                                            class="form-control" placeholder="Enter Email Address" />
                                        @error('email')
                                            <small class="error text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Pin-code (Zip-code)</label>
                                        <input type="number" id="pincode" wire:model.defer="pincode"
                                            class="form-control" placeholder="Enter Pin-code" />
                                        @error('pincode')
                                            <small class="error text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Full Address</label>
                                        <textarea id="address" wire:model.defer="address" class="form-control" rows="2"></textarea>
                                        @error('address')
                                            <small class="error text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div wire:ignore class="col-md-12 mb-3">
                                        <label>Select Payment Mode: </label>
                                        <div class="d-md-flex align-items-start">
                                            <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab"
                                                role="tablist" aria-orientation="vertical">
                                                <button wire:loading.attr="disabled"
                                                    class="nav-link active border-gray-200 fw-bold"
                                                    id="cashOnDeliveryTab-tab" data-bs-toggle="pill"
                                                    data-bs-target="#cashOnDeliveryTab" type="button" role="tab"
                                                    aria-controls="cashOnDeliveryTab" aria-selected="true">Cash
                                                    on Delivery</button>
                                                <button wire:loading.attr="disabled"
                                                    class="nav-link border-gray-200 fw-bold" id="onlinePayment-tab"
                                                    data-bs-toggle="pill" data-bs-target="#onlinePayment" type="button"
                                                    role="tab" aria-controls="onlinePayment"
                                                    aria-selected="false">Online Payment</button>
                                            </div>
                                            <div class="tab-content col-md-9" id="v-pills-tabContent">
                                                <div class="tab-pane active show fade" id="cashOnDeliveryTab"
                                                    role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab"
                                                    tabindex="0">
                                                    <h6>Cash on Delivery Mode</h6>
                                                    <hr />
                                                    <button type="button" wire:loading.attr="disabled"
                                                        wire:click="PlaceOrderCod" class="btn btn-primary">
                                                        <span wire:loading.remove wire:target="PlaceOrderCod">
                                                            Place Order (Cash on
                                                            Delivery)
                                                        </span>
                                                        <span wire:loading wire:target="PlaceOrderCod">
                                                            Placing Order...
                                                        </span>
                                                    </button>
                                                </div>
                                                <div class="tab-pane fade" id="onlinePayment" role="tabpanel"
                                                    aria-labelledby="onlinePayment-tab" tabindex="0">
                                                    <h6>Online Payment Mode</h6>
                                                    <hr />
                                                    <div>
                                                        <div id="paypal-button-container"></div>
                                                    </div>
                                                    {{-- <button type="button" wire:loading.attr="disabled" class="btn btn-warning">Pay Now (Online
                                                        Payment)</button> --}}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            @else
                <div class="card card-body shadow-md text-center">
                    <h4>
                        No Items in the cart <a class="btn btn-danger" href="{{ url('collections') }}">Shop Now</a>
                    </h4>
                </div>
            @endif

        </div>
    </div>
</div>

@push('scripts')
    <script
        src="https://www.paypal.com/sdk/js?client-id=AQylVbJLglU-7F4SkP3ljTTiN9yxqfnqNuXYCFCSBJ40l5K5t0xaxgizxh7HyqXNvaj2jrH3YHudMNDu&currency=USD">
    </script>
    <script>
        paypal.Buttons({
            //validation of inputs
            onClick: function() {
                // Show a validation error if the checkbox is not checked
                if (!document.getElementById('fullname').value ||
                    !document.getElementById('email').value ||
                    !document.getElementById('phone_number').value ||
                    !document.getElementById('pincode').value ||
                    !document.getElementById('address').values
                ) {
                    Livewire.emit('ValidateAllFields');
                    return false;
                } else {
                    @this.set('fullname', document.getElementById('fullname').value);
                    @this.set('email', document.getElementById('email').value);
                    @this.set('phone_number', document.getElementById('phone_number').value);
                    @this.set('pincode', document.getElementById('pincode').value);
                    @this.set('address', document.getElementById('address').value);
                }
            },
            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '1.00' // Can also reference a variable or function
                        }
                    }]
                });
            },
            // Finalize the transaction after payer approval
            onApprove: (data, actions) => {
                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For dev/demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    const transaction = orderData.purchase_units[0].payments.captures[0];
                    if(transaction.status == "COMPLETED")
                    {
                        Livewire.emit('TransactionEmit',transaction.id);
                    }
                    else
                    {

                    }
                    // alert(
                    //     `Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`
                    // );
                    // When ready to go live, remove the alert and show a success message within this page. For example:
                    // const element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    // Or go to another URL:  actions.redirect('thank_you.html');
                });
            }
        }).render('#paypal-button-container');
    </script>
@endpush
