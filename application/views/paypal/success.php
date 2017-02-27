<div>
    <h2>Dear Member</h2>
    <span>Your payment was successful, thank you for purchase.</span><br/>
    <span>Item Number : 
        <strong><?php echo $item_number; ?></strong>
    </span><br/>
    <span>TXN ID : 
        <strong><?php echo $txn_id; ?></strong>
    </span><br/>
    <span>Amount Paid : 
        <strong>$<?php  if(isset( $payment_amt)) {  echo $payment_amt.' '.$currency_code; } ?></strong>
    </span><br/>
   
        <strong><?php //if(isset($status)) { echo $status; } ?></strong>
    
</div>