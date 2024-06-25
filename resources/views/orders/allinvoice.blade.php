<body>
    <form action="profile2.show" method="GET">
        <select name="order_id">
            @foreach ($order as $order)
                <option value="{{ $order->id }}">{{ $order->id }}</option>
            @endforeach
        </select>
        <button type="submit">View Invoice</button>
    </form>

    <div id="invoiceholder">
        <div id="invoice" class="effect2">

            <div id="invoice-top">
                <div class="logo"><img
                        src="data:image/png;base64,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"
                        alt="Logo" /></div>
                <div class="title">
                    <h1>Invoice #<span class="invoiceVal invoice_num">{{ $order->id }}</span></h1>
                    <p>Invoice Date: <span id="invoice_date">{{ $order->created_at }}</span><br>
                        Updated Date: <span id="gl_date">{{ $order->updated_at }}</span>
                    </p>
                </div><!--End Title-->
            </div><!--End InvoiceTop-->



            <div id="invoice-mid">
                <div id="message">
                    <h2>Hello {{ $order->Customer->fname }},</h2>
                    <p>An invoice with invoice number #<span id="invoice_num">{{ $order->id }}</span> is created for
                        <span id="supplier_name">TESI S.P.A.</span> which is 100% matched with PO and is waiting for
                        your approval. <a href="javascript:void(0);">Click here</a> to login to view the invoice.</p>
                </div>
                <div class="cta-group mobile-btn-group">
                    <a href="javascript:void(0);" class="btn-primary">Approve</a>
                    <a href="javascript:void(0);" class="btn-default">Reject</a>
                </div>
                <div class="clearfix">
                    <div class="col-left">
                        <div class="clientlogo"><img
                                src="https://cdn3.iconfinder.com/data/icons/daily-sales/512/Sale-card-address-512.png"
                                alt="Sup" /></div>
                        <div class="clientinfo">
                            <h2 id="supplier">Sender</h2>
                            <p><span id="address">VIA SAVIGLIANO, 48</span><br><span id="city">RORETO DI
                                    CHERASCO</span><br><span id="country">IT</span> - <span
                                    id="zip">12062</span><br><span id="tax_num">555-555-5555</span><br></p>
                        </div>
                    </div>
                    <div class="col-right">
                        <div class="clientinfo">
                            <h2 id="supplier">Billing Address</h2>
                            <p><span id="address">{{ $order->customer->address }}</span><br><span
                                    id="city">{{ $order->customer->city }}</span><br><span
                                    id="country">{{ $order->customer->state }}</span> - <span
                                    id="zip">{{ $order->customer->pcode }}</span><br><span
                                    id="tax_num">{{ $order->customer->phone }}</span><br></p>
                        </div>
                    </div>
                </div>
            </div><!--End Invoice Mid-->

            <div id="invoice-bot">

                <div id="table">
                    <table class="table-main">
                        <thead>
                            <tr class="tabletitle">
                                <th>Item</th>
                                <th>Selectd Product</th>
                                <th>Customer Name</th>
                                <th>Status</th>
                                <th>Shopping Address</th>
                                <th>Billing Address</th>
                                <th>Total Amount</th>
                                <th>%</th>
                                <th>Discount Amount</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tr class="list-item">
                            <td data-label="Item" class="tableitem">{{ $order->oname }}</td>
                            <td data-label="Selectd Product" class="tableitem">{{ $order->product->pname }}</td>
                            <td data-label="Customer Name" class="tableitem">{{ $order->customer->fname }}</td>
                            <td data-label="Status" class="tableitem">{{ $order->ostatus }}</td>
                            <td data-label="Shopping Address" class="tableitem">{{ $order->saddress }}</td>
                            <td data-label="Billing Address" class="tableitem">{{ $order->baddress }}</td>
                            <td data-label="Total Amount" class="tableitem">{{ $order->tamount }}</td>
                            <td data-label="%" class="tableitem">{{ $order->discount }}</td>
                            <td data-label="Discount Amount" class="tableitem">{{ $order->damount }}</td>
                            <td data-label="Total" class="tableitem">{{ $order->damount }}</td>
                        </tr>
                        {{-- <tr class="list-item">
              <td data-label="Type" class="tableitem">ITEM</td>
              <td data-label="Description" class="tableitem">Traffico mese di novembre 2017 FRESSNAPF TIERNAHRUNGS GMBH riadd. Almo DE</td>
              <td data-label="Quantity" class="tableitem">4.4</td>
              <td data-label="Unit Price" class="tableitem">1</td>
              <td data-label="Taxable Amount" class="tableitem">46.6</td>
              <td data-label="Tax Code" class="tableitem">DP20</td>
              <td data-label="%" class="tableitem">20</td>
              <td data-label="Tax Amount" class="tableitem">9.32</td>
              <td data-label="AWT" class="tableitem">None</td>
              <td data-label="Total" class="tableitem">55.92</td>
            </tr> --}}
                        <tr class="list-item total-row">
                            <th colspan="9" class="tableitem">Grand Total</th>
                            <td data-label="Grand Total" class="tableitem">{{ $order->damount }}</td>
                        </tr>
                    </table>
                </div><!--End Table-->
                {{-- <div class="cta-group">
          <a href="{{route('order.invoice',$order->id)}}" class="btn-primary">Download</a>
          <a href="javascript:void(0);" class="btn-default">Reject</a>
      </div>  --}}

            </div><!--End InvoiceBot-->
            <footer>
                <div id="legalcopy" class="clearfix">
                    <p class="col-right">Our mailing address is:
                        <span class="email"><a
                                href="mailto:supplier.portal@almonature.com">supplier.portal@almonature.com</a></span>
                    </p>
                </div>
            </footer>
        </div><!--End Invoice-->
    </div><!-- End Invoice Holder-->

</body>


<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400,900,700,500,300,100);

    * {
        margin: 0;
        box-sizing: border-box;
        -webkit-print-color-adjust: exact;
    }

    body {
        background: #E0E0E0;
        font-family: 'Roboto', sans-serif;
    }

    ::selection {
        background: #f31544;
        color: #FFF;
    }

    ::moz-selection {
        background: #f31544;
        color: #FFF;
    }

    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }

    .col-left {
        float: left;
    }

    .col-right {
        float: right;
    }

    h1 {
        font-size: 1.5em;
        color: #444;
    }

    h2 {
        font-size: .9em;
    }

    h3 {
        font-size: 1.2em;
        font-weight: 300;
        line-height: 2em;
    }

    p {
        font-size: .75em;
        color: #666;
        line-height: 1.2em;
    }

    a {
        text-decoration: none;
        color: #00a63f;
    }

    #invoiceholder {
        width: 100%;
        height: 100%;
        padding: 50px 0;
    }

    #invoice {
        position: relative;
        margin: 0 auto;
        width: 700px;
        background: #FFF;
    }

    [id*='invoice-'] {
        /* Targets all id with 'col-' */
        /*  border-bottom: 1px solid #EEE;*/
        padding: 20px;
    }

    #invoice-top {
        border-bottom: 2px solid #00a63f;
    }

    #invoice-mid {
        min-height: 110px;
    }

    #invoice-bot {
        min-height: 240px;
    }

    .logo {
        display: inline-block;
        vertical-align: middle;
        width: 110px;
        overflow: hidden;
    }

    .info {
        display: inline-block;
        vertical-align: middle;
        margin-left: 20px;
    }

    .logo img,
    .clientlogo img {
        width: 100%;
    }

    .clientlogo {
        display: inline-block;
        vertical-align: middle;
        width: 50px;
    }

    .clientinfo {
        display: inline-block;
        vertical-align: middle;
        margin-left: 20px
    }

    .title {
        float: right;
    }

    .title p {
        text-align: right;
    }

    #message {
        margin-bottom: 30px;
        display: block;
    }

    h2 {
        margin-bottom: 5px;
        color: #444;
    }

    .col-right td {
        color: #666;
        padding: 5px 8px;
        border: 0;
        font-size: 0.75em;
        border-bottom: 1px solid #eeeeee;
    }

    .col-right td label {
        margin-left: 5px;
        font-weight: 600;
        color: #444;
    }

    .cta-group a {
        display: inline-block;
        padding: 7px;
        border-radius: 4px;
        background: rgb(196, 57, 10);
        margin-right: 10px;
        min-width: 100px;
        text-align: center;
        color: #fff;
        font-size: 0.75em;
    }

    .cta-group .btn-primary {
        background: #00a63f;
    }

    .cta-group.mobile-btn-group {
        display: none;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    td {
        padding: 10px;
        border-bottom: 1px solid #cccaca;
        font-size: 0.70em;
        text-align: left;
    }

    .tabletitle th {
        border-bottom: 2px solid #ddd;
        text-align: right;
    }

    .tabletitle th:nth-child(2) {
        text-align: left;
    }

    th {
        font-size: 0.7em;
        text-align: left;
        padding: 5px 10px;
    }

    .item {
        width: 50%;
    }

    .list-item td {
        text-align: right;
    }

    .list-item td:nth-child(2) {
        text-align: left;
    }

    .total-row th,
    .total-row td {
        text-align: right;
        font-weight: 700;
        font-size: .75em;
        border: 0 none;
    }

    .table-main {}

    footer {
        border-top: 1px solid #eeeeee;
        ;
        padding: 15px 20px;
    }

    .effect2 {
        position: relative;
    }

    .effect2:before,
    .effect2:after {
        z-index: -1;
        position: absolute;
        content: "";
        bottom: 15px;
        left: 10px;
        width: 50%;
        top: 80%;
        max-width: 300px;
        background: #777;
        -webkit-box-shadow: 0 15px 10px #777;
        -moz-box-shadow: 0 15px 10px #777;
        box-shadow: 0 15px 10px #777;
        -webkit-transform: rotate(-3deg);
        -moz-transform: rotate(-3deg);
        -o-transform: rotate(-3deg);
        -ms-transform: rotate(-3deg);
        transform: rotate(-3deg);
    }

    .effect2:after {
        -webkit-transform: rotate(3deg);
        -moz-transform: rotate(3deg);
        -o-transform: rotate(3deg);
        -ms-transform: rotate(3deg);
        transform: rotate(3deg);
        right: 10px;
        left: auto;
    }

    @media screen and (max-width: 767px) {
        h1 {
            font-size: .9em;
        }

        #invoice {
            width: 100%;
        }

        #message {
            margin-bottom: 20px;
        }

        [id*='invoice-'] {
            padding: 20px 10px;
        }

        .logo {
            width: 140px;
        }

        .title {
            float: none;
            display: inline-block;
            vertical-align: middle;
            margin-left: 40px;
        }

        .title p {
            text-align: left;
        }

        .col-left,
        .col-right {
            width: 100%;
        }

        .table {
            margin-top: 20px;
        }

        #table {
            white-space: nowrap;
            overflow: auto;
        }

        td {
            white-space: normal;
        }

        .cta-group {
            text-align: center;
        }

        .cta-group.mobile-btn-group {
            display: block;
            margin-bottom: 20px;
        }

        /*==================== Table ====================*/
        .table-main {
            border: 0 none;
        }

        .table-main thead {
            border: none;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        .table-main tr {
            border-bottom: 2px solid #eee;
            display: block;
            margin-bottom: 20px;
        }

        .table-main td {
            font-weight: 700;
            display: block;
            padding-left: 40%;
            max-width: none;
            position: relative;
            border: 1px solid #cccaca;
            text-align: left;
        }

        .table-main td:before {
            /*
        * aria-label has no advantage, it won't be read inside a table
        content: attr(aria-label);
        */
            content: attr(data-label);
            position: absolute;
            left: 10px;
            font-weight: normal;
            text-transform: uppercase;
        }

        .total-row th {
            display: none;
        }

        .total-row td {
            text-align: left;
        }

        footer {
            text-align: center;
        }
    }
</style>
