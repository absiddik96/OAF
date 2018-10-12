<div class="form-group form-float">
    <div class="">
        <label style="color: #AAAAAA;font-weight: normal;" class="form-label">Payment Method*</label>
        {!! Form::radio('payment_method', 1, null, ['class'=>'radio-col-deep-purple','required'=>'','id'=>'radio_12']) !!}
        <label for="radio_12">Bkash</label>
        {!! Form::radio('payment_method', 2, null, ['class'=>'radio-col-deep-purple','required'=>'','id'=>'radio_13']) !!}
        <label for="radio_13">Rocket</label>
    </div>
</div>

<div class="form-group form-float">
    <div class="form-line">
        {!! Form::text('transaction_number', null, ['class'=>'form-control','required'=>'']) !!}
        <label class="form-label">Transaction Number*</label>
    </div>
</div>

<div class="form-group form-float">
    <div class="form-line">
        {!! Form::text('txn_id', null, ['class'=>'form-control','required'=>'']) !!}
        <label class="form-label">TXN ID*</label>
    </div>
</div>
<ul><b>Payment Instruction</b>
    <li><span class="material-icons">keyboard_arrow_right</span>bKash Merchant Number is 017xx-xxxxxx</li>
    <li><span class="material-icons">keyboard_arrow_right</span>Rocket Merchant Number is 017xx-xxxxxx</li>
    <li><span class="material-icons">keyboard_arrow_right</span>Input Transaction number in Transaction Number box which the mobile number that you make the payment</li>
    <li><span class="material-icons">keyboard_arrow_right</span>Input only Transaction ID in Transaction Details box which you will get via sms from bKash & Rocket</li>
    <li><span class="material-icons">keyboard_arrow_right</span>For Cash/Bank Transaction, input details in Transaction Details include date, receipt number, transaction number</li>
</ul>
