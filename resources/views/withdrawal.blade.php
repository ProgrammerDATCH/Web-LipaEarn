@section('header')
    <title>Withdraw</title>
@endsection
<x-layout :notifications="$notifications" :notificationscounts="$notifications_counts">
    <div class="container-xxl flex-grow-1 container-p-y">
        <section>
            <div class="container py-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12 col-lg-10 col-xl-8">
                        <div class="card">
                            <div class="card-body p-md-5">
                                <div>
                                    <h4>Withdrawal</h4>
                                    <p class="text-muted pb-2">Please make Sure The Number You Entered Is Correct</p>
                                </div>

                                <div class="px-3 py-4 border border-primary border-2 rounded mt-4 d-flex justify-content-between flex-wrap">
                                    <div class="d-flex flex-row align-items-center">
                                        <img src="{{ asset('storage/images/logo_old.svg') }}" class="flex-column" />
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <input type="text" hidden value="{{ $UserEarning->total_earnings ?? 0 }}" class="default_amount">
                                        <span class="h2 mb-0 me-1 text-primary amount_left" id="amountTotal">{{ $UserEarning->total_earnings ?? 0 }}</span><span class="h2 mb-0 text-primary">{{$country_data->currency}}</span>
                                    </div>
                                </div>
                                <div class="mt-4 d-flex flex-row align-items-center justify-content-center">
                                    <input type="text" hidden value="{{ $country_data->withdrawal_fees ?? 0 }}" class="withdrawal_fees_input">
                                   <span class="h4 text-primary mb-0 me-3">Fees:</span>
                                     <span class="h4 mb-0 me-1 text-danger withdrawal_fees">{{ $country_data->withdrawal_fees ?? 0 }}</span><span class="h4 ms-1 mb-0 text-danger">{{$country_data->currency}}</span>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger mt-2 mb-2">
                                        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success mt-2 mb-2">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form action="{{ route('WithdrawalRequest') }}" method="post">
                                    @csrf
                                    <h6 class="mt-4 mb-3 text-primary text-uppercase">Enter Number To Withdrawal</h6>

                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xl-6">
                                            <label for="withdrawNumber">Your number</label>
                                            <input type="text" id="WithdrawNumber"class="form-control user-select-none" placeholder="Number You Want To Withdraw To" name="number" value="{{ $user->number }}" contenteditable="false">
                                        </div>
                                        <style>
                                            /* Remove inner spin for numbered input */
                                            input[type="number"]::-webkit-inner-spin-button {
                                                -webkit-appearance: none;
                                                margin: 0;
                                            }
                                        </style>
                                        <div class="col-md-6 col-sm-6 col-xl-6">
                                            <label for="amount">Amount</label>
                                            <input type="number" id="amount" class="form-control" placeholder="Amount You Want To Withdraw" name="amount" value="{{ old('amount') }}">
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <button class="btn btn-primary btn-block btn-lg">Proceed to withdrawal <i class="fas fa-long-arrow-alt-right"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @section('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const amountInput = document.querySelector('#amount');
                const amountTotal = document.getElementById('amountTotal');
                const defaultAmount = parseFloat(document.querySelector('.default_amount').value);
                const shrinkedAmount = parseFloat(amountTotal.textContent);

                const withdrawalFees = document.querySelector('.withdrawal_fees');
                const withdrawalFeesInput = parseFloat(document.querySelector('.withdrawal_fees_input').value);

                const updateAmount = () => {
                    const inputValue = parseFloat(amountInput.value) || 0;
                    const calculatedAmount = shrinkedAmount - (inputValue + withdrawalFeesInput);

                    amountTotal.textContent = calculatedAmount.toFixed(2);

                    // Change the class based on the calculated amount
                    amountTotal.classList.remove('text-danger', 'text-primary');
                    amountTotal.classList.add(calculatedAmount < 0 ? 'text-danger' : 'text-primary');
                };

                amountInput.addEventListener('input', updateAmount);

                amountInput.addEventListener('blur', () => {
                    amountTotal.textContent = defaultAmount.toFixed(2);
                    withdrawalFees.textContent = withdrawalFeesInput.toFixed(2);
                    updateAmount();
                });
            });
        </script>
    @endsection


</x-layout>
