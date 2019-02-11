<div role="dialog"  class="modal fade" style="display: none;">
    <style>
        .account_settings .modal-body {
            border: 0;
            margin-bottom: -35px;
            border: 0;
            padding: 0;
        }

        .account_settings .panel-footer {
            margin: -15px;
            margin-top: 20px;
        }

        .account_settings .panel {
            margin-bottom: 0;
            border: 0;
        }
    </style>
    <div class="modal-dialog account_settings">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">
                    <i class="ico-cogs"></i>
                    @lang("ManageAccount.Tickets_information")</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- tab -->
                        <ul class="nav nav-tabs">
                            <li class="active" style="display:none"><a href="#payment_account" data-toggle="tab">@lang("ManageAccount.payment")</a></li>
                        </ul>
                        <div class="tab-content panel">
                            <div class="tab-pane active" id="payment_account">
                                @include('ManageAccount.Partials.PaymentGatewayOptions')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>