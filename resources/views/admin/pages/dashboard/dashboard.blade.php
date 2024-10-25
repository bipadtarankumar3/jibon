@extends('admin.layouts.main')

@section('content')
<div class="right_part">
    <div class="row row-cols-3 gy-4">
        <div class="col">
            <div class="coutn_box">
                <p>
                    Wallet
                    <br>
                    ₹ -1260550
                </p>
            </div>
        </div>
        <div class="col">
            <div class="coutn_box" style="background: #48ABF7;">
                <p>
                    Borrowers
                    <br>
                    101
                </p>
            </div>
        </div>
        <div class="col">
            <div class="coutn_box" style="background: #F25961;">
                <p>
                    Loans
                    <br>
                    101
                </p>
            </div>
        </div>
        <div class="col">
            <div class="coutn_box" style="background: #6861CE;">
                <p>
                    Outstanding
                    <br>
                    ₹ 1591750
                </p>
            </div>
        </div>
        <div class="col">
            <div class="coutn_box" style="background: #1de9b6;">
                <p>
                    Today Emi
                    <br>
                    ₹ 18950
                </p>
            </div>
        </div>
        <div class="col">
            <div class="coutn_box" style="background: #31CE36;">
                <p>
                    Pending Emi
                    <br>
                    ₹9400
                </p>
            </div>
        </div>
    </div>
    <div class="btm_emi">
        <div class="row row-cols-2 gy-4">
            <div class="col">
                <div class="coutn_box" style="background: #48ABF7;">
                    <p>
                        Weekly EMI
                        <br>
                        129960
                    </p>
                </div>
            </div>
            <div class="col">
                <div class="coutn_box" style="background: #48ABF7;">
                    <p>
                        Weekly Pending
                        <br>
                        129960
                    </p>
                </div>
            </div>
            <div class="col">
                <div class="coutn_box" style="background: #31CE36;">
                    <p>
                        Monthly EMI
                        <br>
                        129960
                    </p>
                </div>
            </div>
            <div class="col">
                <div class="coutn_box" style="background: #31CE36;">
                    <p>
                        Monthly Pending
                        <br>
                        129960
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
