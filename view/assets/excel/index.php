 <?php


    ?>

 <head>

     <style>
         .container {
             max-width: 800px;
             height: auto;
             margin: auto;
             margin-top: 40px;
         }

         .action {
             float: right;
         }

         span {
             margin-right: 20px;
         }

         button {
             padding: 6px 20px;
         }

         table {
             font-family: arial, sans-serif;
             border-collapse: collapse;
             width: 100%;
             position: relative;
             top: 10px;
         }

         td,
         th {
             border: 1px solid #dddddd;
             text-align: left;
             padding: 8px;
         }

         tr:nth-child(even) {
             background-color: #dddddd;
         }
     </style>
 </head>

 <body>
     <div class="container">
         <div class="action">
             <span>Export table to:</span>
             <button>Xls</button>
         </div>
         <table id="table">
             <tr>
                 <th>STT</th>
                 <th>Sản phẩm</th>
                 <th>Giá</th>
                 <th>Giá gốc</th>
                 <th>Mô tả</th>
             </tr>

             <?php
                if (isset($tongsosp)) {
                    foreach ($tongsosp as $key => $product) {
                ?>
                     <tr>
                         <td><?php echo $key ?></td>
                         <td><?php echo $product['name'] ?></td>
                         <td><?php echo $product['price'] ?></td>
                         <td><?php echo $product['old_price'] ?></td>
                         <td><?php echo $product['describe1'] ?></td>
                     </tr>
             <?php
                    }
                }
                ?>
         </table>
     </div>
     <script src="./view/assets/js/sheet.js"></script>
     <script src="./view/assets/js/script.js"></script>
 </body>

 </html>