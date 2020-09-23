<?php 

switch(get_user_login('role_login_id')) {
    case 1:
        if (isset($_GET['page'])) $page=$_GET['page'];
        else $page="beranda";

        if ($page == "beranda")                     include("pages/dashboard.php");
        elseif ($page == "logout")                  include("pages/logout.php");

        //------------------------------------ PROFIL ------------------------------------
        elseif ($page == 'profile')                 include("pages/profile/profile.php");
        elseif ($page == 'profileedit')             include("pages/profile/profileedit.php");

        //------------------------------------ CUSTOMER ------------------------------------
        elseif ($page == 'customer')                include("pages/customer/customer.php");
        elseif ($page == 'customeradd')             include("pages/customer/customeradd.php");
        elseif ($page == 'customeraddpro')          include("pages/customer/customeraddpro.php");
        elseif ($page == 'customeredit')            include("pages/customer/customeredit.php");
        elseif ($page == 'customereditpro')         include("pages/customer/customereditpro.php");
        elseif ($page == 'customerdelete')          include("pages/customer/customerdelete.php");

        //------------------------------------ PRODUCT ------------------------------------
        elseif ($page == 'product')                 include("pages/product/product.php");
        elseif ($page == 'productadd')              include("pages/product/productadd.php");
        elseif ($page == 'productaddpro')           include("pages/product/productaddpro.php");
        elseif ($page == 'productedit')             include("pages/product/productedit.php");
        elseif ($page == 'producteditpro')          include("pages/product/producteditpro.php");
        elseif ($page == 'productdelete')           include("pages/product/productdelete.php");

        //------------------------------------ USER ------------------------------------
        elseif ($page == 'user')                    include("pages/user/user.php");
        elseif ($page == 'useradd')                 include("pages/user/useradd.php");
        elseif ($page == 'useraddpro')              include("pages/user/useraddpro.php");
        elseif ($page == 'useredit')                include("pages/user/useredit.php");
        elseif ($page == 'usereditpro')             include("pages/user/usereditpro.php");
        elseif ($page == 'userdelete')              include("pages/user/userdelete.php");

        //------------------------------------ REG ------------------------------------
        elseif ($page == 'reg')                     include("pages/reg/reg.php");
        elseif ($page == 'regadd')                  include("pages/reg/regadd.php");
        elseif ($page == 'regaddpro')               include("pages/reg/regaddpro.php");
        elseif ($page == 'regedit')                 include("pages/reg/regedit.php");
        elseif ($page == 'regeditpro')              include("pages/reg/regeditpro.php");
        elseif ($page == 'regdelete')               include("pages/reg/regdelete.php");

        //------------------------------------ INVOICE ------------------------------------
        elseif ($page == 'invoice')                 include("pages/invoice/invoice.php");
        elseif ($page == 'invoiceadd')              include("pages/invoice/invoiceadd.php");
        elseif ($page == 'invoiceaddpro1')          include("pages/invoice/invoiceaddpro1.php");
        elseif ($page == 'invoiceaddpro2')          include("pages/invoice/invoiceaddpro2.php");
        elseif ($page == 'invoiceaddpro3')          include("pages/invoice/invoiceaddpro3.php");
        elseif ($page == 'invoiceaddpro4')          include("pages/invoice/invoiceaddpro4.php");
        elseif ($page == 'invoiceedit1')            include("pages/invoice/invoiceedit1.php");
        elseif ($page == 'invoiceeditpro1')         include("pages/invoice/invoiceeditpro1.php");
        elseif ($page == 'invoiceedit2')            include("pages/invoice/invoiceedit2.php");
        elseif ($page == 'invoiceeditpro2')         include("pages/invoice/invoiceeditpro2.php");
        elseif ($page == 'invoiceedit3')            include("pages/invoice/invoiceedit3.php");
        elseif ($page == 'invoiceeditpro3')         include("pages/invoice/invoiceeditpro3.php");
        elseif ($page == 'invoiceedit4')            include("pages/invoice/invoiceedit4.php");
        elseif ($page == 'invoiceeditpro4')         include("pages/invoice/invoiceeditpro4.php");

        elseif ($page == 'invoicechangereqpro1')    include("pages/invoice/invoicechangereqpro1.php");
        elseif ($page == 'invoiceprint')            include("pages/invoice/invoiceprint.php");

        else include("pages/404.php");
    break;
    case 2:
        if (isset($_GET['page'])) $page=$_GET['page'];
        else $page="beranda";

        if ($page == "beranda")                     include("pages/dashboard.php");
        elseif ($page == "logout")                  include("pages/logout.php");

        //------------------------------------ PROFIL ------------------------------------
        elseif ($page == 'profile')                 include("pages/profile/profile.php");
        elseif ($page == 'profileedit')             include("pages/profile/profileedit.php");

        //------------------------------------ CUSTOMER ------------------------------------
        elseif ($page == 'customer')                include("pages/customer/customer.php");
        elseif ($page == 'customeradd')             include("pages/customer/customeradd.php");
        elseif ($page == 'customeraddpro')          include("pages/customer/customeraddpro.php");
        elseif ($page == 'customeredit')            include("pages/customer/customeredit.php");
        elseif ($page == 'customereditpro')         include("pages/customer/customereditpro.php");
        elseif ($page == 'customerdelete')          include("pages/customer/customerdelete.php");

        //------------------------------------ PRODUCT ------------------------------------
        elseif ($page == 'product')                 include("pages/product/product.php");
        elseif ($page == 'productadd')              include("pages/product/productadd.php");
        elseif ($page == 'productaddpro')           include("pages/product/productaddpro.php");
        elseif ($page == 'productedit')             include("pages/product/productedit.php");
        elseif ($page == 'producteditpro')          include("pages/product/producteditpro.php");
        elseif ($page == 'productdelete')           include("pages/product/productdelete.php");

        //------------------------------------ USER ------------------------------------
        elseif ($page == 'user')                    include("pages/user/user.php");
        elseif ($page == 'useradd')                 include("pages/user/useradd.php");
        elseif ($page == 'useraddpro')              include("pages/user/useraddpro.php");
        elseif ($page == 'useredit')                include("pages/user/useredit.php");
        elseif ($page == 'usereditpro')             include("pages/user/usereditpro.php");
        elseif ($page == 'userdelete')              include("pages/user/userdelete.php");

        //------------------------------------ REG ------------------------------------
        elseif ($page == 'reg')                     include("pages/reg/reg.php");
        elseif ($page == 'regadd')                  include("pages/reg/regadd.php");
        elseif ($page == 'regaddpro')               include("pages/reg/regaddpro.php");
        elseif ($page == 'regedit')                 include("pages/reg/regedit.php");
        elseif ($page == 'regeditpro')              include("pages/reg/regeditpro.php");
        elseif ($page == 'regdelete')               include("pages/reg/regdelete.php");

        //------------------------------------ INVOICE ------------------------------------
        elseif ($page == 'invoice')                 include("pages/invoice/invoice.php");
        elseif ($page == 'invoiceprint')            include("pages/invoice/invoiceprint.php");

        else include("pages/404.php");
    break;
    default:
        if (isset($_GET['page'])) $page=$_GET['page'];
        else $page="beranda";

        if ($page == "beranda")                     include("pages/dashboard.php");
        elseif ($page == "logout")                  include("pages/logout.php");

        //------------------------------------ PROFIL ------------------------------------
        elseif ($page == 'profile')                 include("pages/profile/profile.php");
        elseif ($page == 'profileedit')             include("pages/profile/profileedit.php");

        //------------------------------------ CUSTOMER ------------------------------------
        elseif ($page == 'customer')                include("pages/customer/customer.php");
        elseif ($page == 'customeradd')             include("pages/customer/customeradd.php");
        elseif ($page == 'customeraddpro')          include("pages/customer/customeraddpro.php");
        elseif ($page == 'customeredit')            include("pages/customer/customeredit.php");
        elseif ($page == 'customereditpro')         include("pages/customer/customereditpro.php");
        elseif ($page == 'customerdelete')          include("pages/customer/customerdelete.php");

        //------------------------------------ PRODUCT ------------------------------------
        elseif ($page == 'product')                 include("pages/product/product.php");
        elseif ($page == 'productadd')              include("pages/product/productadd.php");
        elseif ($page == 'productaddpro')           include("pages/product/productaddpro.php");
        elseif ($page == 'productedit')             include("pages/product/productedit.php");
        elseif ($page == 'producteditpro')          include("pages/product/producteditpro.php");
        elseif ($page == 'productdelete')           include("pages/product/productdelete.php");

        //------------------------------------ USER ------------------------------------
        elseif ($page == 'user')                    include("pages/user/user.php");
        elseif ($page == 'useradd')                 include("pages/user/useradd.php");
        elseif ($page == 'useraddpro')              include("pages/user/useraddpro.php");
        elseif ($page == 'useredit')                include("pages/user/useredit.php");
        elseif ($page == 'usereditpro')             include("pages/user/usereditpro.php");
        elseif ($page == 'userdelete')              include("pages/user/userdelete.php");

        //------------------------------------ REG ------------------------------------
        elseif ($page == 'reg')                     include("pages/reg/reg.php");
        elseif ($page == 'regadd')                  include("pages/reg/regadd.php");
        elseif ($page == 'regaddpro')               include("pages/reg/regaddpro.php");
        elseif ($page == 'regedit')                 include("pages/reg/regedit.php");
        elseif ($page == 'regeditpro')              include("pages/reg/regeditpro.php");
        elseif ($page == 'regdelete')               include("pages/reg/regdelete.php");

        //------------------------------------ INVOICE ------------------------------------
        elseif ($page == 'invoice')                 include("pages/invoice/invoice.php");
        elseif ($page == 'invoiceadd')              include("pages/invoice/invoiceadd.php");
        elseif ($page == 'invoiceaddpro1')          include("pages/invoice/invoiceaddpro1.php");
        elseif ($page == 'invoiceaddpro2')          include("pages/invoice/invoiceaddpro2.php");
        elseif ($page == 'invoiceaddpro3')          include("pages/invoice/invoiceaddpro3.php");
        elseif ($page == 'invoiceaddpro4')          include("pages/invoice/invoiceaddpro4.php");
        elseif ($page == 'invoiceedit1')            include("pages/invoice/invoiceedit1.php");
        elseif ($page == 'invoiceeditpro1')         include("pages/invoice/invoiceeditpro1.php");
        elseif ($page == 'invoiceedit2')            include("pages/invoice/invoiceedit2.php");
        elseif ($page == 'invoiceeditpro2')         include("pages/invoice/invoiceeditpro2.php");
        elseif ($page == 'invoiceedit3')            include("pages/invoice/invoiceedit3.php");
        elseif ($page == 'invoiceeditpro3')         include("pages/invoice/invoiceeditpro3.php");
        elseif ($page == 'invoiceedit4')            include("pages/invoice/invoiceedit4.php");
        elseif ($page == 'invoiceeditpro4')         include("pages/invoice/invoiceeditpro4.php");

        elseif ($page == 'invoicechangereqpro1')    include("pages/invoice/invoicechangereqpro1.php");
        elseif ($page == 'invoiceprint')            include("pages/invoice/invoiceprint.php");

        else include("pages/404.php"); 
    break;
}