@extends('admin.layouts.main')

@section('content')
<div class="right_part">
    <div class="row row-cols-3 gy-4">
        <div class="col">
            <div class="coutn_box">
                <p>
                    Wallet
                    <br>
                    ₹ {{ number_format($wallet, 2) }}
                </p>
            </div>
        </div>
        <div class="col">
            <div class="coutn_box" style="background: #48ABF7;">
                <p>
                    Borrowers
                    <br>
                    {{ $brrowers }}
                </p>
            </div>
        </div>
        <div class="col">
            <div class="coutn_box" style="background: #F25961;">
                <p>
                    Loans
                    <br>
                    {{ $loans }}
                </p>
            </div>
        </div>
        <div class="col">
            <div class="coutn_box" style="background: #6861CE;">
                <p>
                    Outstanding
                    <br>
                    ₹ {{ number_format($outstanding, 2) }}
                </p>
            </div>
        </div>
        <div class="col">
            <div class="coutn_box" style="background: #1de9b6;">
                <p>
                    Today EMI
                    <br>
                    ₹ {{ number_format($todayEmi, 2) }}
                </p>
            </div>
        </div>
        <div class="col">
            <div class="coutn_box" style="background: #31CE36;">
                <p>
                    Pending EMI
                    <br>
                    ₹ {{ number_format($pendingEmi, 2) }}
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
                        ₹ {{ number_format($weeklyEmi, 2) }}
                    </p>
                </div>
            </div>
            <div class="col">
                <div class="coutn_box" style="background: #48ABF7;">
                    <p>
                        Weekly Pending
                        <br>
                        ₹ {{ number_format($weeklyPendingEmi, 2) }}
                    </p>
                </div>
            </div>
            <div class="col">
                <div class="coutn_box" style="background: #31CE36;">
                    <p>
                        Monthly EMI
                        <br>
                        ₹ {{ number_format($monthlyEmi, 2) }}
                    </p>
                </div>
            </div>
            <div class="col">
                <div class="coutn_box" style="background: #31CE36;">
                    <p>
                        Monthly Pending
                        <br>
                        ₹ {{ number_format($monthlyPendingEmi, 2) }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
