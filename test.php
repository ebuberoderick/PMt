<form method="post" name="ticket" id="paymentForm" accept-charset="UTF-8">
                <div class="input-field mt-2" style="width:100% !important">
                    <select name="" class="browser-default fromD">
                        <option selected Disabled>From</option>
                        <?php
                            $check=mysqli_query($pcon,"SELECT Dfrom FROM directions");
                            while ($vald = mysqli_fetch_array($check)) {
                               ?>
                                    <option value="<?php echo $vald['Dfrom'] ?>"><?php echo $vald['Dfrom'] ?></option>
                               <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="input-group mb-3 form-controler" style="width:100% !important">
                    <select name="" class="browser-default toD">
                        <option selected Disabled>To</option>
                    </select>
                </div>
                <div class="input-field">
                    <input type="number" required class="inp put1" name="username" style="">
                    <label for="date" class="p-1 pl-2 pr-2" style="pointer-events:none">Enter Receivers contact</label>
                </div>
                <div class="input-field">
                    <input type="number" class="inp put1" name="username" style="">
                    <label for="date" class="p-1 pl-2 pr-2" style="pointer-events:none">Enter Another Receivers contact</label>
                </div>
                <div class="input-field">
                    <input type="number" class="inp put1" name="username" style="">
                    <label for="date" class="p-1 pl-2 pr-2" style="pointer-events:none">Enter Weight In Kg</label>
                </div>
                <div style="display:">
                    <div style="display:">
                        <div class="price mb-3">
                            PRICE:
                            <div class="flow-text">
                                NGN 0.00
                            </div>
                        </div>
                        <input type="" id="totalPrice">
                    </div>
                    <button type="submit" onclick="payWithPaystack()" class="btn btn-peace mb-3 book btnre disabled">Send goods now</button>
                </div>
            </form>