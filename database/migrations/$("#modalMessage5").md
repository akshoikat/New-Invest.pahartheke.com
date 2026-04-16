  $("#modalMessage5").text(" {{$orders->name}}");
                        $("#modalMessage6").text(" {{$orders->phone}}");
                        $("#modalMessage7").text(" {{$orders->address}}");
                        $("#modalMessage8").text("{{$orders->total_price}}");
                        $("#modalMessage10").text("{{$orders->order_no}}");



                        <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light" style="direction: ltr;">
                            <tr>
                                <th>Order No.</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody style="direction: rtl;">
                            <tr>
                                <td id="modalMessage10"></td> 
                                <td id="modalMessage5"></td>  
                                <td id="modalMessage6"></td> 
                                <td id="modalMessage7"></td>  
                                <td id="modalMessage8"></td>  
                            </tr>
                        </tbody>
                    </table>
                </div>