<style>
    form.woocommerce-checkout {
    display: flex;
    align-items: flex-start;
    flex-wrap: wrap;
    column-gap: 30px;
    width: 100%;
}

@media (min-width: 1025px) {
    form.woocommerce-checkout>:is(.customer-details,.checkout-order-review) {
        flex: 0 0 calc(50% - 15px);
        max-width: calc(50% - 15px);
    }
}

@media (min-width: 769px) {
    form.woocommerce-checkout>.customer-details {
        flex: 0 0 calc(41.666667% - 15px);
        max-width: calc(41.666667% - 15px);
    }
}

.woocommerce-checkout>.customer-details .woocommerce-billing-fields {
    margin-top: 30px;
    margin-bottom: 20px;
}
.woocommerce-billing-fields>h3 {
    text-transform: uppercase;
}
.woocommerce-billing-fields__field-wrapper {
    text-align: start;
}
.woocommerce-billing-fields:after {
    content: "";
    display: block;
    clear: both;
}
p {
    margin-bottom: 20px;
}
@media (min-width: 1025px) {
    p.form-row-wide {
        clear: both;
    }
}

label {
    display: block;
    margin-bottom: 5px;
    color: var(--wd-title-color);
    vertical-align: middle;
    font-weight: 400;
}
.required {
    border: none;
    color: #E01020;
    font-size: 16px;
    line-height: 1;
}
abbr {
    border-bottom: 1px dotted;
    color: #D62432;
    text-decoration: none;
}
abbr[title] {
    border: none;
}
.woocommerce form .form-row .required {
    visibility: visible;
}
.woocommerce-billing-fields__field-wrapper {
    text-align: start;
}

input[type='email'], input[type='date'], input[type='search'], input[type='number'], input[type='text'], input[type='tel'], input[type='url'], input[type='password'], textarea, select {
    padding: 0 15px;
    max-width: 100%;
    width: 100%;
    height: var(--wd-form-height);
    border: var(--wd-form-brd-width) solid var(--wd-form-brd-color);
    border-radius: var(--wd-form-brd-radius);
    background-color: var(--wd-form-bg);
    box-shadow: none;
    color: var(--wd-form-color);
    vertical-align: middle;
    font-size: 14px;
    transition: border-color .5s ease;
}

.woocommerce-billing-fields p:last-child {
    margin-bottom: 0;
}
.woocommerce-additional-fields>h3 {
    text-transform: uppercase;
    font-size: 22px;
}
.woocommerce-additional-fields__field-wrapper {
    text-align: start;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #242424;
    vertical-align: middle;
    font-weight: 400;
}
.woocommerce-checkout>.checkout-order-review, .woocommerce-order-pay #order_review {
    position: relative;
    margin-bottom: 40px;
    padding: 30px;
    background-color: #f7f7f7;
}


@media (min-width: 1025px) {
    form.woocommerce-checkout>:is(.customer-details,.checkout-order-review) {
        flex: 0 0 calc(50% - 15px);
        max-width: calc(50% - 15px);
    }
}

@media (min-width: 769px) {
    form.woocommerce-checkout>.checkout-order-review {
        flex: 0 0 calc(58.333333% - 15px);
        max-width: calc(58.333333% - 15px);
    }
}
.woocommerce-checkout>.checkout-order-review:before, .woocommerce-order-pay #order_review:before {
    top: -10px;
    background-position: -3px -5px, 0 0;
}
.woocommerce-checkout>.checkout-order-review:before, .woocommerce-checkout>.checkout-order-review:after, .woocommerce-order-pay #order_review:before, .woocommerce-order-pay #order_review:after {
    content: "";
    position: absolute;
    left: 0;
    width: 100%;
    height: 10px;
    background-color: transparent;
    background-image: radial-gradient(farthest-side, transparent 6px, #f7f7f7 0);
    background-size: 15px 15px;
}

#order_review_heading {
    text-align: center;
    text-transform: uppercase;
}

.woocommerce-checkout>.checkout-order-review:after, .woocommerce-order-pay #order_review:after {
    bottom: -10px;
    background-position: -3px 2px, 0 0;
}
.woocommerce-checkout>.checkout-order-review:before, .woocommerce-checkout>.checkout-order-review:after, .woocommerce-order-pay #order_review:before, .woocommerce-order-pay #order_review:after {
    content: "";
    position: absolute;
    left: 0;
    width: 100%;
    height: 10px;
    background-color: transparent;
    background-image: radial-gradient(farthest-side, transparent 6px, #f7f7f7 0);
    background-size: 15px 15px;
}
.checkout-order-review>.woocommerce-checkout-review-order .wd-table-wrapper {
    overflow-x: auto;
    margin-bottom: 20px;
    padding: 5px 15px;
    border-radius: var(--wd-brd-radius);
    background-color: var(--bgcolor-white);
    box-shadow: 1px 1px 2px rgba(0,0,0,0.05);
}
.woocommerce-checkout-review-order-table {
    display: flex;
    flex-direction: column;
    margin-bottom: 0;
}
table {
    margin-bottom: 35px;
    width: 100%;
    border-spacing: 0;
    border-collapse: collapse;
    line-height: 1.4;
}
thead {
    display: table-header-group;
    vertical-align: middle;
    unicode-bidi: isolate;
    border-color: inherit;
}
.woocommerce-checkout-review-order-table thead tr {
    border-width: 2px;
}
.woocommerce-checkout-review-order-table tr {
    display: flex;
    border-bottom: 1px solid rgba(0,0,0,0.105);
}

.woocommerce-checkout-review-order-table thead th {
    flex-basis: 50%;
}
.woocommerce-checkout-review-order-table :is(th,td) {
    border: none;
}
th.product-name {
    text-align: left;
}
table th {
    padding: 15px 10px;
    border-bottom: rgba(0,0,0,0.075);
    color: #242424;
    text-transform: uppercase;
    font-weight: 600;
    font-size: 16px;
}
.shop_table tr :is(td,th):last-child {
    text-align: right;
}
.woocommerce-checkout-review-order-table thead th {
    flex-basis: 50%;
}
.woocommerce-checkout-review-order-table :is(th,td) {
    border: none;
}
tbody {
    display: table-row-group;
    vertical-align: middle;
    unicode-bidi: isolate;
    border-color: inherit;
}
.woocommerce-checkout-review-order-table tr {
    display: flex;
    border-bottom: 1px solid rgba(0,0,0,0.105);
}
.woocommerce-checkout-review-order-table .cart_item .product-name {
    flex-grow: 1;
}
.woocommerce-checkout-review-order-table :is(th,td) {
    border: none;
}
td.product-name {
    text-align: left;
}
table td {
    padding: 15px 12px;
    border-bottom: 1px solid rgba(0,0,0,0.105);
}
.shop_table tr :is(td,th):last-child {
    text-align: right;
}
tr.cart_item .product-total .amount {
    color: #777;
    font-weight: 400;
}
.woocommerce-checkout-review-order-table tfoot tr {
    align-items: center;
}
.woocommerce-checkout-review-order-table tr {
    display: flex;
    border-bottom: 1px solid rgba(0,0,0,0.105);
}

table :is(tbody,tfoot) th {
    border-bottom: 1px solid rgba(0,0,0,0.105);
    text-transform: none;
    font-size: inherit;
}
.woocommerce-checkout-review-order-table tfoot td {
    flex-grow: 1;
}
.woocommerce-checkout-review-order-table tfoot tr:last-child {
    border: none;
}
tr.order-total th {
    font-size: 18px;
}
tr.order-total strong .amount {
    font-size: 22px;
}
.amount {
    color: #dd9933;
    font-weight: 600;
}
.payment_methods {
    list-style: none;
    --li-pl: 0;
    --li-mb: 15px;
}
li {
    margin-bottom: 15px;
}

input[type="radio"], input[type="checkbox"] {
    box-sizing: border-box;
    margin-top: 0;
    padding: 0;
    vertical-align: middle;
    margin-inline-end: 5px;
}
button, input, optgroup, select, textarea {
    margin: 0;
    color: inherit;
    font: inherit;
}
.payment_methods li>label {
    display: inline;
    margin-bottom: 0;
}
label {
    display: block;
    margin-bottom: 5px;
    color: #242424;
    vertical-align: middle;
    font-weight: 400;
}
.payment_methods .payment_box {
    --wd-tags-mb: 10px;
    position: relative;
    margin-top: 15px;
    padding: 15px;
    background-color: #fff;
    box-shadow: 1px 1px 2px rgba(0,0,0,0.05);
    border-radius: 0;
}
.payment_methods .payment_box:before {
    content: "";
    position: absolute;
    top: -4px;
    inset-inline-start: 25px;
    width: 10px;
    height: 10px;
    transform: rotate(45deg);
    background-color: inherit;
}
.payment_methods .payment_box p:last-child {
    margin-bottom: 0;
}


.custom-card{
    cursor: pointer;
    border-radius: 5px;
}
.custom-card.active{
    border:3px solid green;
    opacity: 0.5;
}
.wd-builder-off #place_order {
    width: 100%;
}
#place_order {
    display: flex;
    padding: 5px 28px;
    min-height: 48px;
    font-size: 14px;
    border-radius: 0;
    color: #fff;
    box-shadow: inset 0 -2px 0 rgba(0, 0, 0, .15);
    background-color: #BC6377;
    text-transform: uppercase;
    font-weight: 600;
}
</style>
