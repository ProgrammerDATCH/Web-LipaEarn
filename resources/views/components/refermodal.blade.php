<div class="modal fade" id="referAndEarn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-refer-and-earn">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3>Refer & Earn</h3>
                    <p class="text-center mb-5 w-75 m-auto">Invite your friend to LipaEarn</p>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-4 px-4">
                        <div class="d-flex justify-content-center mb-4">
                            <div class="modal-refer-and-earn-step bg-label-primary">
                                <i class='bx bx-message-square-dots'></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <h5>Send Invitation 🤟🏻</h5>
                            <p class="mb-lg-0">Send your referral link to your friend</p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 px-4">
                        <div class="d-flex justify-content-center mb-4">
                            <div class="modal-refer-and-earn-step bg-label-primary">
                                <i class='bx bx-detail'></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <h5>Registration 👩🏻‍💻</h5>
                            <p class="mb-lg-0">Let them register to our services</p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 px-4">
                        <div class="d-flex justify-content-center mb-4">
                            <div class="modal-refer-and-earn-step bg-label-primary">
                                <i class='bx bx-gift'></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <h5>Free Bonus 🎉</h5>
                            <p class="mb-0">You will get <span class="badge bg-dark">{{number_format($country->referral_bonus_1)}} {{$country->currency}}</span> if your friend activated his account</p>
                        </div>
                    </div>
                </div>
                <hr class="my-5" />
                <h5>Invite your friends</h5>
                <h5 class="mt-4">Share the referral link</h5>
                <form class="row g-3" onsubmit="return false">
                    <div class="col-lg-9">
                        <label class="form-label" for="modalRnFLink">You can also copy and send it or share it on your social media. 🥳</label>
                        <div class="input-group input-group-merge">
                            <input type="text" id="modalRnFLink" class="form-control" value="{{ route('ReferralRequestForm') . '?user=' . auth()->user()->username }}">
                            <span class="input-group-text text-primary cursor-pointer bx bxs-copy-alt" id="copy-btn"></span>
                        </div>

                        <script>
                            const inputReferralLink = document.getElementById('modalRnFLink');
                            const copyBtn = document.getElementById('copy-btn');

                            copyBtn.addEventListener('click', function() {
                                inputReferralLink.select();
                                document.execCommand('copy');
                                Swal.fire(
                                    'Good job!',
                                    'Text Copied Success Full Ready To Be Shared',
                                    'success'
                                )
                            });
                        </script>
                         <script src="{{ asset('js/extended-ui-sweetalert2.js') }}"></script>
                         <script src="{{ asset('vendor/sweetalert2/sweetalert2.js') }}"></script>

                    </div>
                    <div class="col-lg-3 d-flex align-items-end">
                        <div class="btn-social">
                            <a target="_blank" class="btn btn-icon btn-facebook mr-2" href="https://www.facebook.com/sharer/sharer.php?u={{ route('ReferralRequestForm') . '?user=' . auth()->user()->username }}"><i class="tf-icons bx bxl-facebook"></i></a>
                            <a target="_blank" class="btn btn-icon btn-facebook mr-2" href="https://telegram.me/share/url?url={{ route('ReferralRequestForm') . '?user=' . auth()->user()->username }}&text=Message"><i class="tf-icons bx bxl-telegram"></i></a>
                            <a target="_blank" class="btn btn-icon btn-facebook mr-2" href="https://wa.me/?text={{ route('ReferralRequestForm') . '?user=' . auth()->user()->username }}"><i class="tf-icons bx bxl-whatsapp"></i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
