<?php
// START css wajib
//----------------

{
  echo"<style>

        body {background-color:  #F8F7E6;}

        .mks_button{
            height:23px;
            font-size:12px;
            text-align:center;
            vertical-align: middle;
        }
        .mks_button:hover{
            height:23px;
            font-size:12px;
            text-align:center;
            vertical-align: middle;
            background-color: #cce6ff; //#e5f1fb ;// #ccffff;
        }

        .mks_button_small{
            height:23px;
            width:95px;
            font-size:12px;
            text-align:left;
            vertical-align: middle;
        }
        .mks_button_small:hover{
            height:23px;
            width:95px;
            font-size:12px;
            text-align:left;
            vertical-align: middle;
            background-color: #cce6ff; //#e5f1fb ;// #ccffff;
        }

        .mks_button_admin{
            width:365px;
            height:30px;
            font-size:14px;
            text-align:left;
            vertical-align: middle;
        }
        .mks_button_admin:hover{
          width:365px;
          height:30px;
          font-size:14px;
          text-align:left;
          font-weight: bold;
          background-color: #cce6ff; //#e5f1fb ;// #ccffff;
        }

        .mks_button_renewal{
            width:265px;
            height:23px;
            font-size:12px;
            text-align:center;
            vertical-align: middle;
        }
        .mks_button_renewal:hover{
          width:265px;
          height:23px;
          font-size:12px;
          text-align:center;
          background-color: #cce6ff; //#e5f1fb ;// #ccffff;
        }


        .mks_button_admin_close{
            width:265px;
            height: 23px;
            text-align:center;
            vertical-align: middle;
        }
        .mks_button_admin_close:hover{
          width:265px;
          height: 23px;
          text-align:center;
          background-color: #cce6ff; //#e5f1fb ;// #ccffff;
        }


        /*---------------------------*/
        .big_login_screen{
          background: #fbfbfb;
          border-radius: 8px;
          box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
          margin: 1rem auto 8.1rem auto;
        }
        #card-title {
              font-family: 'Raleway Thin', sans-serif;
              letter-spacing: 4px;
              padding-bottom: 1px;
              padding-top: 1px;
              text-align: center;
        }
        #submit_btn {
            background: -webkit-linear-gradient(right, #f2ca00, #f2ca00);
            border: none;
            border-radius: 21px;
            box-shadow: 0px 1 px 8px #f2ca00;
            cursor: pointer;
            color: black;
            font-family: 'Raleway SemiBold', sans-serif;
            vertical-align: middle;
            font-size:16px;
            height: 30px;
            margin: 0 auto;
            margin-top: 20px;
            margin-bottom: 20px;
            transition: 0.25s;
            width: 153px;
            text-align: center;
        }
        #submit_btn:hover {
            box-shadow: 0px 1px 18px #24c64f;
            background: green;
            color: white;
        }

        .input_login{
          font-family: Helvetica, Times, sans-serif;
          font-size:16px;
          text-align: left;
          color: blue;
          padding: 10;
          vertical-align: middle;
          }



        #list_dept_lg {
            position:relative;
            height:20px;
            width:140px;
        }
        #list_dept_lg select {
            position:absolute;
        }

        /*---------------------------*/

        #button_otp {
           font-size: 12px;
           color: black;
           background: #f2ca00;
           border: 1px solid rgb(37, 34, 34);
           border-radius: 8px;
           padding-top: 8px;
           padding-bottom: 8px;
           padding-right: 8px;
           padding-left: 8px;
        }

        #button_otp:hover {
            box-shadow: 0px 1px 18px #24c64f;
            background: blue;
            color: white;
        }

        /*---------------------------*/

        input:checked + label {
          color: Brown;
          font-size: 15px;
        }

        input[type='checkbox']:checked {
          box-shadow: 0 0 0 4px hotpink;
        }


  ";
}
// END CSS wajib
//-------------

if ( $pass_betul == 'lanjut_kerja' and  $_POST[user_id] <> null )
{

    echo"

        #chat_round_01 {
          border-radius: 25px;
          background: #73AD21;
          padding: 10px;
        }


        .tip0 {
          position: relative;
          display: inline-block;
          background-color: white;
          color: black;
          font-weight: bold;
          border-radius: 50%;
          width: 20px;
          height: 20px;
          text-align: center;
          font-family: courier, mono;
        }

        .tip0 .tiptext0 {
          visibility: hidden;
          width: 130px;
          font-weight: normal;
          background-color: black;
          color: white;
          text-align: left;
          border-radius: 6px;
          padding: 5px 10px;
          position: absolute;
          margin-left: -175px;
          margin-top: 25px;
          z-index: 1;
        }

        .tip0:hover .tiptext0 {
          visibility: visible;
          cursor: pointer;
        }





        .tip1 {
          position: relative;
          display: inline-block;
          background-color: blue;
          color: white;
          font-weight: bold;
          border-radius: 50%;
          width: 20px;
          height: 20px;
          text-align: center;
          font-family: courier, mono;
        }

        .tip1 .tiptext1 {
          visibility: hidden;
          width: 300px;
          font-weight: normal;
          background-color: black;
          color: white;
          text-align: left;
          border-radius: 6px;
          padding: 5px 10px;
          position: absolute;
          margin-left: -350px;
          margin-top: 25px;
          z-index: 1;
        }

        .tip1:hover .tiptext1 {
          visibility: visible;
          cursor: pointer;
        }




        .tip2 {
          position: relative;
          display: inline-block;
          background-color: blue;
          color: white;
          font-weight: bold;
          border-radius: 50%;
          width: 20px;
          height: 20px;
          text-align: center;
          font-family: courier, mono;
        }

        .tip2 .tiptext2 {
          visibility: hidden;
          width: 350px;
          font-weight: normal;
          background-color: black;
          color: white;
          text-align: left;
          border-radius: 6px;
          padding: 5px 10px;
          position: absolute;
          margin-left: -40px;
          margin-top: 25px;
          z-index: 1;
        }

        .tip2:hover .tiptext2{
          visibility: visible;
          cursor: pointer;
        }



        .tip3 {
          position: relative;
          display: inline-block;
          background-color: blue;
          color: white;
          font-weight: bold;
          border-radius: 50%;
          width: 20px;
          height: 20px;
          text-align: center;
          font-family: courier, mono;
        }

        .tip3 .tiptext3 {
          visibility: hidden;
          width: 160px;
          font-weight: normal;
          background-color: black;
          color: white;
          text-align: left;
          border-radius: 6px;
          padding: 5px 10px;
          position: absolute;
          margin-left: 10px;
          margin-top: 25px;
          z-index: 1;
        }

        .tip3:hover .tiptext3{
          visibility: visible;
          cursor: pointer;
        }



        .tip4 {
          position: relative;
          display: inline-block;
          background-color: blue;
          color: white;
          font-weight: bold;
          border-radius: 50%;
          width: 20px;
          height: 20px;
          text-align: center;
          font-family: courier, mono;
        }

        .tip4 .tiptext4 {
          visibility: hidden;
          width: 275px;
          font-weight: normal;
          background-color: black;
          color: white;
          text-align: left;
          border-radius: 6px;
          padding: 5px 10px;
          position: absolute;
          margin-left: 15px;
          margin-top: 25px;
          z-index: 1;
        }

        .tip4:hover .tiptext4{
          visibility: visible;
          cursor: pointer;
        }



        .tip5 {
          position: relative;
          display: inline-block;
          background-color: blue;
          color: white;
          font-weight: bold;
          border-radius: 50%;
          width: 20px;
          height: 20px;
          text-align: center;
          font-family: courier, mono;
        }

        .tip5 .tiptext5 {
          visibility: hidden;
          width: 300px;
          font-weight: normal;
          background-color: black;
          color: white;
          text-align: left;
          border-radius: 6px;
          padding: 5px 10px;
          position: absolute;
          margin-left: -300px;
          margin-top: 25px;
          z-index: 1;
        }

        .tip5:hover .tiptext5{
          visibility: visible;
          cursor: pointer;
        }



        .tip6 {
          position: relative;
          display: inline-block;
          background-color: blue;
          color: white;
          font-weight: bold;
          border-radius: 50%;
          width: 20px;
          height: 20px;
          text-align: center;
          font-family: courier, mono;
        }

        .tip6 .tiptext6 {
          visibility: hidden;
          width: 260px;
          font-weight: normal;
          background-color: black;
          color: white;
          text-align: left;
          border-radius: 6px;
          padding: 5px 10px;
          position: absolute;
          margin-left: -50px;
          margin-top: 25px;
          z-index: 1;
        }

        .tip6:hover .tiptext6{
          visibility: visible;
          cursor: pointer;
        }



      .tip7 {
        position: relative;
        display: inline-block;
        background-color: blue;
        color: white;
        font-weight: bold;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        text-align: center;
        font-family: courier, mono;
      }

      .tip7 .tiptext7 {
        visibility: hidden;
        width: 360px;
        font-weight: normal;
        background-color: black;
        color: white;
        text-align: left;
        border-radius: 6px;
        padding: 5px 10px;
        position: absolute;
        margin-left: -400px;
        margin-top: -100px;
        z-index: 1;
      }

      .tip7:hover .tiptext7{
        visibility: visible;
        cursor: pointer;
      }


      .tip10 {
        position: relative;
        display: inline-block;
        background-color: blue;
        color: white;
        font-weight: bold;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        text-align: center;
        font-family: courier, mono;
      }

      .tip10 .tiptext10 {
        visibility: hidden;
        width: 250px;
        font-weight: normal;
        background-color: black;
        color: white;
        text-align: left;
        border-radius: 6px;
        padding: 5px 10px;
        position: absolute;
        margin-left: -150px;
        margin-top: 25px;
        z-index: 1;
      }

      .tip10:hover .tiptext10{
        visibility: visible;
        cursor: pointer;
      }


      .tip11 {
        position: relative;
        display: inline-block;
        background-color: blue;
        color: white;
        font-weight: bold;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        text-align: center;
        font-family: courier, mono;
      }

      .tip11 .tiptext11 {
        visibility: hidden;
        width: 470px;
        font-weight: normal;
        background-color: black;
        color: white;
        text-align: left;
        border-radius: 6px;
        padding: 5px 10px;
        position: absolute;
        margin-left: -250px;
        margin-top: 25px;
        z-index: 1;
      }

      .tip11:hover .tiptext11{
        visibility: visible;
        cursor: pointer;

      }


      .tip12 {
        position: relative;
        display: inline-block;
        background-color: blue;
        color: white;
        font-weight: bold;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        text-align: center;
        font-family: courier, mono;
      }

      .tip12 .tiptext12 {
        visibility: hidden;
        width: 440px;
        font-weight: normal;
        background-color: black;
        color: white;
        text-align: left;
        border-radius: 6px;
        padding: 5px 10px;
        position: absolute;
        margin-left: -300px;
        margin-top: 25px;
        z-index: 1;
      }

      .tip12:hover .tiptext12{
        visibility: visible;
        cursor: pointer;

      }


      .tip13 {
        position: relative;
        display: inline-block;
        background-color: blue;
        color: white;
        font-weight: bold;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        text-align: center;
        font-family: courier, mono;
      }

      .tip13 .tiptext13 {
        visibility: hidden;
        width: 440px;
        font-weight: normal;
        background-color: black;
        color: white;
        text-align: left;
        border-radius: 6px;
        padding: 5px 10px;
        position: absolute;
        margin-left: -280px;
        margin-top: 25px;
        z-index: 1;
      }

      .tip13:hover .tiptext13{
        visibility: visible;
        cursor: pointer;

      }



    .tip14 {
      position: relative;
      display: inline-block;
      background-color: blue;
      color: white;
      font-weight: bold;
      border-radius: 50%;
      width: 20px;
      height: 20px;
      text-align: center;
      font-family: courier, mono;
    }

    .tip14 .tiptext14 {
      visibility: hidden;
      width: 440px;
      font-weight: normal;
      background-color: black;
      color: white;
      text-align: left;
      border-radius: 6px;
      padding: 5px 10px;
      position: absolute;
      margin-left: -320px;
      margin-top: 25px;
      z-index: 1;
    }

    .tip14:hover .tiptext14{
      visibility: visible;
      cursor: pointer;

    }


        .tip_x .tiptext_x {
          visibility: hidden;
          width: 270px;
          font-weight: normal;
          background-color: black;
          color: white;
          text-align: left;
          position: absolute;
          margin-left: 15px;
          margin-top: 25px;
          z-index: 1;
        }

        .tip_x:hover .tiptext_x{
          visibility: visible;
          cursor: pointer;
        }




        .tip100 {
          position: relative;
          display: inline-block;
          background-color: blue;
          color: white;
          font-weight: bold;
          border-radius: 50%;
          width: 20px;
          height: 20px;
          text-align: center;
          font-family: courier, mono;
        }

        .tip100 .tiptext100 {
          visibility: hidden;
          width: 320px;
          font-weight: normal;
          background-color: black;
          color: white;
          text-align: left;
          border-radius: 6px;
          padding: 5px 10px;
          position: absolute;
          margin-left: 15px;
          margin-top: 25px;
          z-index: 1;
        }

        .tip100:hover .tiptext100{
          visibility: visible;
          cursor: pointer;
        }





      .tip300 {
        position: relative;
        display: inline-block;
        background-color: blue;
        color: white;
        font-weight: bold;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        text-align: center;
        font-family: courier, mono;
      }

      .tip300 .tiptext300 {
        visibility: hidden;
        width: 350px;
        font-weight: normal;
        background-color: black;
        color: white;
        text-align: left;
        border-radius: 6px;
        padding: 5px 10px;
        position: absolute;
        margin-left: 15px;
        margin-top: 25px;
        z-index: 1;
      }

      .tip300:hover .tiptext300{
        visibility: visible;
        cursor: pointer;
      }



      .tip310 {
        position: relative;
        display: inline-block;
        background-color: blue;
        color: white;
        font-weight: bold;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        text-align: center;
        font-family: courier, mono;
      }

      .tip310 .tiptext310 {
        visibility: hidden;
        width: 300px;
        font-weight: normal;
        background-color: black;
        color: white;
        text-align: left;
        border-radius: 6px;
        padding: 5px 10px;
        position: absolute;
        margin-left: -220px;
        margin-top: 25px;
        z-index: 1;
      }

      .tip310:hover .tiptext310{
        visibility: visible;
        cursor: pointer;
      }



        /*---------------------------------------------------*/

          .button_print_pdf {
            font-family: Helvetica, Times, sans-serif;
            font-size:13x;
            text-decoration: none;
            background-color: #e8e6e6;
            color: black; //#333333;
            padding: 3px 6px 3px 6px;
            border-top: 1px solid #CCCCCC;
            border-right: 1px solid #333333;
            border-bottom: 1px solid #333333;
            border-left: 1px solid #CCCCCC;
          }
          .button_print_pdf:hover{
              background-color: #cce6ff; //#e5f1fb ;// #ccffff;
          }


        /*---------------------------------------------------*/


          .tbl_mks {
          	border:1px solid;
          	border-color:gray;
          	border-collapse:collapse;
          	padding:2px;
          	font-size:14px;
            font-family: Helvetica, Times, sans-serif;
            line-height: 20px;
          }
          table.tbl_mks th {
          	border:1px solid;
          	border-color:white;
          	background-color:black;
          	color:white;
          	text-align:center;
          	padding:2px;
            font-size:14px;
            font-family: Helvetica, Times, sans-serif;
          }
          table.tbl_mks td {
          	border:1px solid;
          	border-color:gray;
          	padding:3px;
            font-size:14px;
            font-family: Helvetica, Times, sans-serif;
          }
          table.tbl_mks input {
          	font-size:14px;
            font-family: Helvetica, Times, sans-serif;
          }

          table.tbl_mks select {
          	font-size:14px;
            font-family: Helvetica, Times, sans-serif;
          }



          .tbl_mks_blue {
          	border:1px solid;
          	border-color:gray;
          	border-collapse:collapse;
          	padding:2px;
          	font-size:14px;
            font-family: Helvetica, Times, sans-serif;
            line-height: 20px;

          }
          table.tbl_mks_blue th {
          	border:1px solid;
          	border-color:white;
          	background-color:blue;
          	color:white;
          	text-align:center;
          	padding:2px;
            font-size:14px;
            font-family: Helvetica, Times, sans-serif;
          }
          table.tbl_mks_blue td {
          	border:1px solid;
          	border-color:gray;
          	padding:3px;
            font-size:14px;
            font-family: Helvetica, Times, sans-serif;
          }
          table.tbl_mks_blue input {
          	font-size:14px;
            font-family: Helvetica, Times, sans-serif;
          }
          table.tbl_mks_blue select {
          	font-size:14px;
            font-family: Helvetica, Times, sans-serif;
          }


          .tbl_mks_cover_mst{
            font-family: Helvetica, Times, sans-serif;
            font-size:14px;
          	border:1px solid;
          	border-color:#F8F7E6;
          	border-collapse:collapse;
          	padding:0px;
          }
          table.tbl_mks_cover_mst td {
          	font-family: Helvetica, Times, sans-serif;
            font-size:14px;
            border:1px solid;
          	border-color:#F8F7E6;
          	padding:0px;
          }
          table.tbl_mks_cover_mst input {
          	font-family: Helvetica, Times, sans-serif;
            font-size:14px;
            text-align:right;
            border-color:none;
            background-color:  #F8F7E6;
          }


          .tbl_mks_cover_thn {
          	border:1px solid;
            font-family: Helvetica, Times, sans-serif;
          	font-size:14px;
            border-collapse:collapse;
          	padding:0px;
            border-style:solid;
            border-color:#F8F7E6;
          }
          table.tbl_mks_cover_thn td {
          	border:1px solid;
            border-style:solid;
            border-color:#F8F7E6;
          	padding:0px;
            font-family: Helvetica, Times, sans-serif;
            font-size:14px;
          }
          table.tbl_mks_cover_thn input {
          	font-size:14px;
            font-family: Helvetica, Times, sans-serif;
          }
          table.tbl_mks_cover_thn select {
          	font-size:14px;
            padding:1px;
            font-family: Helvetica, Times, sans-serif;

          }

        /*---------------------------------------------------*/


        #scroll_table_ren tbody{
        clear:both;
        border:0px solid 3FF6600;
        height:105px;
        overflow:auto;
        float:left;
        width:420px;
        background:#E2E6E7;
        }
    ";




}


echo "
</style>


";
?>
