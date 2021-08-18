<?php include('partials/header.php'); ?>
    <!-- Start Side Bar -->
    <?php include('partials/sidebar.php'); ?>
        <!--  Navbar Ends -->

        <main>
            <div class="page-header">
                <div>
                    <h1>Order List</h1>
                    <small>Monitor and View Orders.</small>
                    <?php 
                        if(isset($_SESSION['cancell'])){
                            echo $_SESSION['cancell'];
                            unset($_SESSION['cancell']);
                        }
                        if(isset($_SESSION['delivered'])){
                            echo $_SESSION['delivered'];
                            unset($_SESSION['delivered']);
                        }
                    ?>
                </div>
            </div>

            <div class="jobs">
                <div class="table-responsive">
                    <table width="100%">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="head">Index</div>
                                </td>
                                <td>
                                    <div class="head">Customer Name</div>
                                </td>
                                <td>
                                    <div class="head">Customer Address</div>
                                </td>
                                <td>
                                    <div class="head">Customer Contact</div>
                                </td>
                                <td>
                                    <div class="head">Item List</div>
                                </td>
                                <td>
                                    <div class="head">Total Price</div>
                                </td>
                                <td>
                                    <div class="head">Date</div>
                                </td>
                                <td>
                                    <div class="head">Status</div>
                                </td>
                                <td>
                                    <div class="head">Actions</div>
                                </td>
                            </tr>
                            <?php 
                                $sql = "SELECT * FROM order_table ORDER BY status='Ordered' DESC";

                                $res = mysqli_query($conn,$sql);

                                if($res==TRUE){
                                    $count = mysqli_num_rows($res);

                                    if($count>0){
                                        $sn=1;
                                        while($rows = mysqli_fetch_assoc($res)){
                                            $order_id = $rows['order_id'];
                                            $item_id = $rows['item_id'];
                                            $qty = $rows['qty'];
                                            $customer_name = $rows['customer_name'];
                                            $customer_address = $rows['customer_address'];
                                            $customer_contact = $rows['customer_contact'];
                                            $total_price= $rows['total_price'];
                                            $order_date= $rows['order_date'];
                                            $status= $rows['status'];

                                            $sql2 = "SELECT * FROM item_table WHERE item_id=$item_id";
                                            $res2 = mysqli_query($conn,$sql2);
                                            $count2 = mysqli_num_rows($res2);
                                            if($count2>0){
                                                while($row2=mysqli_fetch_assoc($res2)){
                                                    $item_name = $row2['item_name'];
                                                }
                                            }

                                            if($status != "Cancelled") {
                                            ?>
                            <tr>
                                <td>
                                    <div><?php echo $sn++; ?></div>
                                </td>
                                <td>
                                    <div><?php echo $customer_name; ?></div>
                                </td>
                                <td>
                                    <div><?php echo $customer_address; ?></div>
                                </td>
                                <td>
                                    <div><?php echo $customer_contact; ?></div>
                                </td>
                                <td>
                                    <div><?php echo $item_name; ?></div>
                                </td>
                                <td>
                                    <div>Rs <?php echo $total_price; ?></div>
                                </td>
                                <td>
                                    <div><?php echo $order_date; ?></div>
                                </td>
                                <?php 
                                    if($status == "Delivered"){
                                        ?>
                                <td>
                                    <div>
                                        <?php echo "<div style='color: green;'>$status</div>"; ?>        
                                    </div>
                                </td>
                                <td>
                                    <div></div>
                                </td>
                                <?php 
                                    } else {
                                        ?>
                                        <td>
                                        <div>
                                            <?php  echo "<div style='color: crimson;'>$status</div>"; ?>        
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="<?php echo SITEURL; ?>admin_area/order-status.php?id=<?php echo $order_id; ?>" class="update">Deliver Now</a>
                                            <a href="<?php echo SITEURL; ?>admin_area/order-cancell.php?id=<?php echo $order_id; ?>" class="remove">Cancell Order</a>
                                        </div>
                                    </td>
                                        <?php
                                    }
                                ?>
                            </tr>
                            <?php
                                            }
                                        }

                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </section>

    <?php include('partials/footer.php'); ?>
