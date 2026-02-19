<style>
    .woocommerce-my-account-wrapper {
        display: flex;
        margin-inline: -30px;
    }

    .wd-my-account-sidebar {
        flex: 1 0 25%;
        max-width: 25%;
        width: 25%;
        padding: 10px 30px;
        border-inline-end: 1px solid rgba(0, 0, 0, 0.075);
    }



    .woocommerce-MyAccount-title {
        font-size: 18px;
        padding-inline: 15px 10px;
        padding-bottom: 10px;
        margin-bottom: 15px;
        text-transform: uppercase;
        border-bottom: 1px solid rgba(0, 0, 0, 0.105);
    }

    .woocommerce-MyAccount-navigation {
        margin-bottom: 30px;
    }

    /* ol, ul {
        box-sizing: border-box;
    } */
    .woocommerce-MyAccount-navigation ul {
        list-style: none;
        --li-pl: 0;
        --list-mb: 0;
        --li-mb: 0;
    }

    /* li {
        margin-bottom: 0;
    } */
    .woocommerce-MyAccount-navigation ul li a {
        display: block;
        padding: 10px 15px;
        color: #242424;
        line-height: 20px;
        text-transform: none;
        font-size: 14px;
        font-weight: 600;
        border-radius: 0;
    }

    .woocommerce-MyAccount-navigation ul li a:hover {
        color: #242424;
        background-color: rgba(0, 0, 0, 0.03);
        text-decoration: none;
    }


    .woocommerce-MyAccount-navigation ul li.is-active>a {
        background-color: #0000000f;
        cursor: default;
    }

    .woocommerce-MyAccount-content {
        flex: 1 0 75%;
        max-width: 75%;
        width: 75%;
        padding: 10px 30px;
    }

    .woocommerce-notices-wrapper:empty {
        display: none;
    }

    .woocommerce-MyAccount-content>p {
        font-size: 110%;
    }

    p {
        margin-bottom: 20px;
    }

    .wd-my-account-links[class*="wd-grid"] {
        --wd-col-lg: 3;
        --wd-col-md: 2;
        --wd-col-sm: 1;
        --wd-gap-lg: 20px;
        margin-top: 30px;
    }

    [class*="wd-grid"] {
        --wd-col: var(--wd-col-lg);
        --wd-gap: var(--wd-gap-lg);
        --wd-col-lg: 1;
        --wd-gap-lg: 20px;
    }

    .wd-grid-g {
        display: grid;
        grid-template-columns: repeat(var(--wd-col), minmax(0, 1fr));
        gap: var(--wd-gap);
    }

    .wd-my-account-links .dashboard-link {
        display: none;
    }

    .wd-my-account-links a {
        display: block;
        padding: 20px;
        font-weight: 600;
        text-align: center;
        color: #555;
        border-radius: 0;
        box-shadow: 0 0 4px rgba(0, 0, 0, 0.18);
    }

    .wd-my-account-links a:hover {
        color: #555;
        background-color: rgba(0, 0, 0, 0.03);
    }

    .wd-my-account-links a:hover .icon {
        color: #BC6377;
        transition: 0.5
    }

    @media only screen and (min-width: 320px) and (max-width: 768px) {
        .woocommerce-my-account-wrapper {
            display: block;
            margin-inline: -30px;
        }

        .wd-my-account-sidebar {
            flex: 1 0 100%;
            max-width: 100%;
            width: 100%;
            padding: 10px 30px;
            border-inline-end: 1px solid rgba(0, 0, 0, 0.075);
        }

        .woocommerce-MyAccount-content {
            flex: 1 0 100%;
            max-width: 100%;
            width: 100%;
        }



    }

    @media (max-width: 768.98px) {
        [class*="wd-grid"] {
            --wd-col: var(--wd-col-sm);
            --wd-gap: var(--wd-gap-sm);
            --wd-col-sm: var(--wd-col-md);
            --wd-gap-sm: var(--wd-gap-md);
        }
    }




    .wd-empty-page {
        position: relative;
        margin-top: 5vw;
        margin-bottom: 15px;
        color: var(--wd-title-color);
        text-align: center;
        font-weight: var(--wd-title-font-weight);
        font-style: var(--wd-title-font-style);
        font-size: 48px;
        font-family: var(--wd-title-font);
        line-height: 1.2;
    }

    .wd-empty-page:before {
        display: block;
        margin-bottom: 20px;
        color: rgba(var(--bgcolor-black-rgb), 0.07);
        font-weight: 400;
        font-size: 3.8em;
        line-height: 1;
    }

    .wd-empty-page-text {
        margin-bottom: 0;
        text-align: center;
        font-size: 110%;
    }

    .wd-empty-page-text+.return-to-shop {
        margin-top: 25px;
        margin-bottom: 5vw;
    }

    button[name="save_account_details"], button[name="save_address"] {
    border-radius: 0px;
    color: #fff;
    box-shadow: inset 0 -2px 0 rgba(0, 0, 0, .15);
    background-color: #BC6176 !important;
    text-transform: uppercase;
    font-weight: 600;
}
</style>
