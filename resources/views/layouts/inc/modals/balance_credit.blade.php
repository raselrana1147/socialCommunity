<div class="popup-box mid convertCreditToDoller" style="width: 35%">
 
    <div class="popup-box-content">
      <!-- WIDGET BOX -->
      <div class="widget-box">
        <!-- WIDGET BOX TITLE -->
        <p class="widget-box-title">Convert Credit To Your Mian Balance</p>
        <div class="widget-box-content">
               <form class="form" action="{{ route('user.covert.credit') }}" method="post">
                       @csrf
                       <div class="form-row">
                         <!-- FORM ITEM -->
                         <div class="form-item">
                           <!-- FORM INPUT -->
                           <div class="form-input small active">
                             <label for="group-name">Provide Credit Amount</label>
                             <input type="number" name="credit" class="input-number" required="" min="500">
                             <small>Minimum 500 credit required</small>
                           </div>
                           <!-- /FORM INPUT -->
                         </div>
                         <!-- /FORM ITEM -->
                       </div>
                       <div class="form-row">
                         <!-- FORM ITEM -->
                         <div class="form-item">
                           <!-- FORM INPUT -->
                           <div class="form-input small active">
                            <input type="submit" name="" class="button secondary full" value="Convert">
                           </div>
                           <!-- /FORM INPUT -->
                         </div>
                         <!-- /FORM ITEM -->
                       </div>
                       
                 </form>
           
          <!-- /FORM -->
        </div>
        <!-- WIDGET BOX CONTENT -->
      </div>
      <!-- /WIDGET BOX -->
    </div>
    <!-- /POPUP BOX CONTENT -->
  </div>
  <!-- /POPUP BOX BODY -->
</div>

<div class="popup-box mid withdrawBalance" style="width: 35%">
 
    <div class="popup-box-content">
      <!-- WIDGET BOX -->
      <div class="widget-box">
        <!-- WIDGET BOX TITLE -->
        <p class="widget-box-title">Withdraw Balance</p><br>

        <p class="light">Payment Method: {{Auth::user()->payment_method}}</p>
         <p class="light">Payment Email: {{Auth::user()->payment_email}}</p>
        <div class="widget-box-content">
               <form class="form" action="{{ route('user.withdraw.balance') }}" method="post">
                       @csrf

                       <div class="form-row">
                         <!-- FORM ITEM -->

                         <div class="form-item">
                           <!-- FORM INPUT -->
                           <div class="form-input small active">
                             <label for="group-name">Amount</label>
                             <input type="number" name="balance" class="input-number" required="" min="5">
                             <small>Minimum 5 Dollers required</small>
                           </div>
                         
                         </div>
                       </div>

                       <div class="form-row">
                         <div class="form-item">
                           <div class="form-input small active">
                            <input type="submit" name="" class="button secondary full" value="Withdraw">
                           </div>
                         </div>
 
                       </div>

                       
                 </form>

        </div>

      </div>
    </div>
  </div>
</div>



