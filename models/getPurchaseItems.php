<?php
$invoiceId = intval($_GET['invoiceId']);

require '../config/dbConnection.php';
    $sql = "SELECT DISTINCT(product_name), round((100-purchase_invoice_item_details.margin)/100*purchase_invoice_item_details.unit_price, 2) 'purchase_Price' , purchase_invoice_item_details.hst 'hst', purchase_invoice_item_details.quantity 'quantity', item_amount 
    FROM `purchase_invoice_item_details`, `product_master` 
    WHERE invoice_id='$invoiceId' and `purchase_invoice_item_details`.`product_id` = `product_master`.`product_id`;";
            $result = mysqli_query($link,$sql);
            
    $sql2 = "SELECT total_amount, total_margin, total_tax, invoice_amount 
            FROM `purchase_invoice_payment_details`
            WHERE invoice_id='$invoiceId';";
            $result2 = mysqli_query($link,$sql2);
?>  
            <table class="table table-hover table-sortable" id="tab_logic">
                                 <thead>
                                    <tr >
                                       <th class="text-center">
                                          Product ID
                                       </th>
                                       <th class="text-center">
                                          Purchase Price (Excluding Tax)
                                       </th>
                                       <th class="text-center">
                                          Tax %
                                       </th>
                                       <th class="text-center"> 
                                          Quantity
                                       </th>
                                       <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">Sub Total
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php  while($row = mysqli_fetch_assoc($result)) :  ?>
                                    <tr id='addr0' data-id="0" class="hidden">
                                       <td data-name="invoiceId" class="text-center" >
                                          <?php echo $row['product_name']?>
                                       </td>
                                       <td class="text-center"> 
                                          <?php echo $row['purchase_Price']?> 
                                       </td>
                                       <td class="text-center"> 
                                          <?php echo $row['hst']?> 
                                       </td>
                                       <td class="text-center">
                                          <?php echo $row['quantity']?>
                                       </td>
                                       <td class="text-center">
                                          <?php echo $row['item_amount']?>
                                       </td>
                                    </tr>
                                    <?php endwhile;?>

                            
                                    
                                 </tbody>
                              </table>

                              <div class="row"> 
                              <?php  while($row2 = mysqli_fetch_assoc($result2)) :  ?>
                              <div class="col-md-3">
                              Total : <input type="number" id="total" class="form-control" disabled="" value="<?php echo $row2['total_amount']?>"/>
                              </div>
                              <div class="col-md-3">
                              Margin : <input type="number" id="tax" class="form-control" disabled="" value="<?php echo $row2['total_margin']?>"/>
                              </div>
                              <div class="col-md-3">
                              Tax : <input type="number" id="discount" class="form-control" disabled="" value="<?php echo $row2['total_tax']?>"/>
                              </div>
                              <div class="col-md-3">
                              Final Amount : <input type="number" id="finalAmount" class="form-control" disabled="" value="<?php echo $row2['invoice_amount']?>"/>
                              </div>
                              <?php endwhile;?>
                              </div><br><br>