<div class="container-fluid">
  <br>

  <form action="http://localhost/Garage92/razorpay/invoices.php" method="post" id="invoice_form">
    <div class="table-responsive">
      <nav class="navbar navbar-default card">
        <div class="container-fluid">
          <div class="navbar-header">
            <h1 class="navbar-brand">Billing System</h1>
          </div>
        </div>
      </nav>
      <table class="table table-bordered card">

        <tbody>
          <tr>
            <td colspan="2">
              <div class="row">
                <div class="col-md-8">

                  <b>RECEIVER (BILL TO) INFORMATION</b><br>
                  <div class="form-group mt-1">
                    <input type="text" name="receiver-name" id="receiver-name" class="form-control input-sm" placeholder="Enter Receiver Name">
                  </div>
                  <div class="form-group mt-1">
                    <textarea name="invoice-description" id="invoice-description" class="form-control" placeholder="Invoice Description"></textarea>
                  </div>
                </div>
                <div class="col-md-4">
                  <b>INVOICE DETAILS</b><br>
                  <div class="form-group mt-1">
                    <input type="number" name="receiver_phone-no" id="receiver_phone-no" class="form-control input-sm number_only" placeholder="Phone Number" min="0">
                  </div>

                  <div class="form-group mt-1">
                    <input type="email" name="receiver_email" id="receiver_email" class="form-control input-sm" placeholder="Receivers Email">
                  </div>
                  <div class="form-group mt-1">
                    <input type="checkbox" name="draft-invoice" id="draft-invoice" value="1">
                    <label for="draft-invoice">Draft Invoice</label>
                  </div>
                </div>
              </div>
              <br>
              <table id="invoice-item-table" class="table table-bordered table-hover table-striped">
                <tbody>
                  <tr>
                    <th width="5%">S/N.</th>
                    <th width="20%">Item Name</th>
                    <th width="20%">Description</th>
                    <th width="5%">Quantity</th>
                    <th width="12.5%" rowspan="1">Amount</th>
                    <th width="3%" rowspan="2"></th>
                  </tr>
                  <tr>
                    <td><span id="sr_no">1</span></td>
                    <td><input type="text" name="item_name" id="item_name" class="form-control input-sm"></td>
                    <td><input type="text" name="item_description" id="item_description" data-srno="1" class="form-control input-sm"></td>
                    <td><input type="number" name="item_quantity" id="item_quantity" data-srno="1" class="form-control input-sm" min="0"></td>
                    <td><input type="number" name="item_amount" id="item_amount" data-srno="1"  class="form-control input-sm" min="0"></td>
                  </tr>
                </tbody>
              </table>
              <!-- <div align="right">
                <button type="button" name="add_row" id="add_row" class="btn btn-success">+</button>
              </div> -->
            </td>
          </tr>
          <!-- <tr>
            <td align="right"><b>Total</b></td>
            <td align="right"><b><span id="final_total_amt"></span></b></td>
          </tr> -->
          <tr>
            <td colspan="2"></td>
          </tr>
          <tr>
            <td colspan="2" align="center">
              <input type="hidden" name="total_item" id="total_item" value="1">
              <input type="submit" name="create_invoice" id="create_invoice" class="btn btn-success" value="Create">
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </form>
</div>