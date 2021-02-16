@extends('layouts.app')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('front/style/css/datatable.min.css')}}">
@endsection
@section('title',((Auth::user()->name !=null)? Auth::user()->name : Auth::user()->username))
@section('main_content')
	<div class="content-grid">
	  <!-- SECTION BANNER -->
	  <div class="section-banner">
	    <!-- SECTION BANNER ICON -->
	    <img class="section-banner-icon" src="{{asset('front/img/banner/accounthub-icon.png')}}" alt="accounthub-icon">
	    <!-- /SECTION BANNER ICON -->
	
	    <!-- SECTION BANNER TITLE -->
	    <p class="section-banner-title">Account Hub</p>
	    <!-- /SECTION BANNER TITLE -->
	
	    <!-- SECTION BANNER TEXT -->
	    <p class="section-banner-text">Profile info, messages, settings and much more!</p>
	    <!-- /SECTION BANNER TEXT -->
	  </div>
	  <!-- /SECTION BANNER -->

	  <!-- GRID -->
	  <div class="grid grid-3-9 medium-space">
	    <!-- GRID COLUMN -->
	    <div class="account-hub-sidebar">
	      <!-- SIDEBAR BOX -->
	      <div class="sidebar-box no-padding">

	       @include('layouts.inc.profile-sidebar')
	      </div>
	      <!-- /SIDEBAR BOX -->
	    </div>
		    <div class="account-hub-content">
        <!-- SECTION HEADER -->
        <div class="section-header">
          <!-- SECTION HEADER INFO -->
          <div class="section-header-info">
            <!-- SECTION PRETITLE -->
            <p class="section-pretitle">My Store</p>
            <!-- /SECTION PRETITLE -->

            <!-- SECTION TITLE -->
            <h2 class="section-title">Withdraw Balance & Credit Redeem</h2>
            <!-- /SECTION TITLE -->
          </div>
          <!-- /SECTION HEADER INFO -->
        </div>

        <div class="grid-column">
          <div class="earning-stat-box full">
           
            <div class="user-stats">
              <div class="earning-stat-box-info">
                <div class="earning-stat-box-icon-wrap stat-balance">
                  <svg class="earning-stat-box-icon icon-wallet">
                    <use xlink:href="#svg-wallet"></use>
                  </svg>
                </div>
                <p class="earning-stat-box-title">{{Auth::user()->credit}}</p>

                <p class="earning-stat-box-text">Available Credit</p>
              </div>
            </div>

            <div class="earning-stat-box-info">
              <div class="earning-stat-box-icon-wrap stat-balance">
                <svg class="earning-stat-box-icon icon-wallet">
                  <use xlink:href="#svg-wallet"></use>
                </svg>
              </div>

              <p class="earning-stat-box-title">{{number_format(Auth::user()->balance)}} <span class="currency">U$D</span></p>

              <p class="earning-stat-box-text">Account Balance</p>
            </div>
            <!-- /USER STATS -->
          </div>
          <!-- /EARNING STAT BOX -->
        </div>
        <!-- /GRID COLUMN -->
     <br>
       <div class="grid-column" id="refreshBalanceCard">
          <div class="earning-stat-box full">
           <div class="row">
             
             <div class="col-sm-6">
               <div class="card" style="border: none">
                 <div class="card-body">
                   <h5 class="card-title">Procced to Redeem</h5>
                   <p class="status-title p-text"> Total {{(Auth::user()->credit*1)/500}} USD are available against {{Auth::user()->credit}} credit. For each 500 credit you will get 1 USD. You can not redeem less than 500 credit.</p>
                    <button class="button secondary small-space convert-credit-to-doller" style="width: 150px">Redeem</button>
                 </div>
               </div>
             </div>
             <div class="col-sm-6">
               <div class="card" style="border: none" >
                 <div class="card-body">
                   <h5 class="card-title">Procced to withdraw</h5>
                   <p class="status-title p-text">Before withdraw balance you have to update your payment option.</p>
                   @if (Auth::user()->payment_method !=null)
                     <button class="button secondary small-space withdraw-balance" style="width: 150px">Withdraw</button>
                     @else
                     <a class="button secondary small-space" href="#mainPaymentSection" style="width: 150px">Withdraw</a>
                   @endif
                 </div>
               </div>
             </div>
           </div>
          </div>
        </div>


        <!-- SECTION HEADER -->
        <div class="section-header" >
          <!-- SECTION HEADER INFO -->
          <div class="section-header-info">
            <!-- SECTION PRETITLE -->
            <p class="section-pretitle">My Store</p>
            <!-- /SECTION PRETITLE -->

            <!-- SECTION TITLE -->
            <h2 class="section-title">My Payments</h2>
            <!-- /SECTION TITLE -->
          </div>
          <!-- /SECTION HEADER INFO -->
        </div>
        <!-- /SECTION HEADER -->

        <!-- GRID COLUMN -->
        <div class="grid-column" >
          <!-- GRID -->
          <div class="grid grid-3-6_9 stretched">
            <!-- GRID COLUMN -->
            <div class="grid-column" id="mainPaymentSection">
              <!-- WIDGET BOX -->
              <div class="widget-box">
                <!-- WIDGET BOX TITLE -->
                <p class="widget-box-title">Payment Method</p>
                <div class="widget-box-content">
                  <!-- FORM -->
                  <form class="form" data-action="{{ route('user.update.payment.method') }}" method="post" id="updatePaymentInfo">
                    <!-- FORM ROW -->
                    @csrf
                    <div class="form-row">
                      <!-- CHECKBOX WRAP -->
                      <div class="checkbox-wrap">
                        <input type="radio" id="payment-method-paypal" name="payment_method" value="paypal" required="true" {{(Auth::user()->payment_method=='paypal') ? 'checked' : ''}}>
                        <!-- CHECKBOX BOX -->
                        <div class="checkbox-box round"></div>
                        <!-- /CHECKBOX BOX -->
                        <label class="accordion-trigger-linked" for="payment-method-paypal">Paypal</label>
              
                      </div>
                      <!-- /CHECKBOX WRAP -->
                    </div>
                    <!-- /FORM ROW -->
            
                    <!-- FORM ROW -->
                    <div class="form-row">
                      <!-- CHECKBOX WRAP -->
                      <div class="checkbox-wrap">
                        <input type="radio" id="payment-method-payoneer" name="payment_method" value="payoneer" required="true" {{(Auth::user()->payment_method=='payoneer') ? 'checked' : ''}}>
                        <!-- CHECKBOX BOX -->
                        <div class="checkbox-box round"></div>
                        <!-- /CHECKBOX BOX -->
                        <label class="accordion-trigger-linked" for="payment-method-payoneer">Payoneer</label>
                      </div>
                      <!-- /CHECKBOX WRAP -->
                    </div>

                     <div class="form-row">
                      <!-- CHECKBOX WRAP -->
                      
                       <div class="form-input small active">
                         <label for="group-name">Email</label>
                         <input type="email" name="payment_email" class="input-number" required="" style="width: 220px" value="{{Auth::user()->payment_email}}">
    
                       </div>
      
                    </div>
                    <!-- /FORM ROW -->
               
                  <!-- /FORM -->
                  <div class="form-row">
                  <!-- BUTTON -->
                    <button class="button full primary" type="submit">Confirm Method</button>
                  </div>
                     </form>
                  <!-- /BUTTON -->
                </div>
                <!-- WIDGET BOX CONTENT -->
              </div>
              <!-- /WIDGET BOX -->

              <!-- WIDGET BOX -->

              @if (Auth::user()->payment_method !=null)
      
              <div class="widget-box" id="refreshPayment">
                <p class="widget-box-title">Confirmed Method</p>
                <div class="widget-box-content">
                  <div class="status-info success">
                    <div class="status-icon-wrap">
                      <svg class="status-icon icon-check">
                        <use xlink:href="#svg-check"></use>
                      </svg>
                    </div>
                    <p class="status-title">{{Auth::user()->payment_method}}</p>
                    <p class="status-text">{{Auth::user()->payment_email}}</p>
                  </div>
                </div>
                </div>
                @else
                  <div class="widget-box">
                  
                    <div class="widget-box-content">
                      <div class="status-info success">
                     
                          <p class="status-title">Please Update Payment Method</p>
                        
                       
                      </div>
                    </div>
                    </div>
                 @endif


              <!-- /WIDGET BOX -->
            </div>
            <!-- /GRID COLUMN -->

            <!-- GRID COLUMN -->
            <div class="grid-column">
              <!-- WIDGET BOX -->
              <div class="widget-box">
                <!-- WIDGET BOX TITLE -->
                <p class="widget-box-title">Withdrawal History</p>
                <!-- /WIDGET BOX TITLE -->

                <!-- WIDGET BOX CONTENT -->
                <div class="widget-box-content">
                  <!-- TABLE WRAP -->
                  <div class="table-wrap" data-simplebar>
                    <!-- TABLE -->

                    <table id="withdrawTable">
                       <thead>
                         <tr>
                            <th>DATE</th>
                            <th>METHOD</th>
                            <th>Amount</th>
                            <th>STATUS</th>
                         </tr>
                       </thead>
                       <tbody>
                        @foreach ($withdraws as $withdraw)
                         <tr>
                            <td style="color: #8f91ac">{{ date('M jS, Y',strtotime($withdraw->created_at)) }}</td>
                            <td><span style="font-weight: bold;">{{$withdraw->payment_method}}</span></td>
                            <td><span style="font-weight: bold;">${{$withdraw->amount}}</span></td>
                            <td  style="color: #8f91ac">{{App\helpers\Help::withdrawStatus($withdraw->status)}}</td>
                         </tr>
                         @endforeach
                       </tbody>
                    </table>
                    <!-- /TABLE -->
                  </div>
                  <!-- /TABLE WRAP -->
                </div>
                <!-- WIDGET BOX CONTENT -->
              </div>
              <!-- /WIDGET BOX -->
            </div>
            <!-- /GRID COLUMN -->
          </div>
          <!-- /GRID -->
        </div>
        <!-- /GRID COLUMN -->
      </div>
	  </div>
	  <!-- /GRID -->
	</div>
@endsection

@section('all_modal')
  @include('layouts.inc.modals.balance_credit')
@endsection
@section('scripts')
  <script src="{{asset('front/style/js/datatables.min.js')}}"></script>
  <script>
    $(document).ready( function () {
    $('#withdrawTable').DataTable();
} );
  </script>
@endsection
