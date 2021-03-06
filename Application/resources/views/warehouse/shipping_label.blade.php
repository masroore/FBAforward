@foreach($shipment as $key=>$shipments)
    <div>

        <div class="table-responsive no-padding">
            <table class="table" id="list">
                <thead>
                <tr>
                    <th class="col-md-4"><span>Product</span></th>
                    <th><span>Shipping Method Name</span></th>
                    <th><span>Other Label</span></th>
                    <th><span>Quantity</span></th>
                    <th><span>Amazon Destination</span></th>
                    <th><span>Prep Label</span></th>
                    <th><span>Shipping Label</span></th>
                </tr>
                </thead>
                <tbody>
                {{--*/$other_label=0 /*--}}
                @foreach($shipment_detail as $shipment_details)
                    @if($shipment_details->shipment_id==$shipments->shipment_id)
                        <tr>
                            <td>@if($shipment_details->product_nick_name==''){{ $shipment_details->product_name }}@else{{$shipment_details->product_nick_name}}@endif</td>
                            <td>{{ $shipment_details->shipping_name }}</td>
                            <td>
                                @foreach($other_label_detail as $other_label_details)
                                    @if($other_label_details->prep_detail_id==$shipment_details->prep_detail_id)
                                        @if($other_label_details->label_id=='1')
                                            Suffocation Warning
                                        @elseif($other_label_details->label_id=='2')
                                            This is a Set
                                            {{--*/$other_label=1 /*--}}
                                        @elseif($other_label_details->label_id=='3')
                                            Blank
                                        @elseif($other_label_details->label_id=='4')
                                            Custom
                                        @endif
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach($amazon_destination as $amazon_destinations)
                                    @if($amazon_destinations->shipment_id==$shipments->shipment_id && $amazon_destinations->fulfillment_network_SKU==$shipment_details->fnsku)
                                        {{ $amazon_destinations->qty }}<br>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach($amazon_destination as $amazon_destinations)
                                    @if($amazon_destinations->shipment_id==$shipments->shipment_id && $amazon_destinations->fulfillment_network_SKU==$shipment_details->fnsku)
                                        {{ $amazon_destinations->destination_name }}<br>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach($amazon_destination as $amazon_destinations)
                                    @if($amazon_destinations->shipment_id==$shipments->shipment_id && $amazon_destinations->fulfillment_network_SKU==$shipment_details->fnsku)
                                        {{ $amazon_destinations->label_prep_type }}<br>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach($amazon_destination as $amazon_destinations)
                                    @if($amazon_destinations->shipment_id==$shipments->shipment_id && $amazon_destinations->fulfillment_network_SKU==$shipment_details->fnsku)
                                    <span id="label_tr{{$amazon_destinations->amazon_destination_id}}">
                                    <a href="{{url('warehouse/printshippinglabel/'.$amazon_destinations->amazon_destination_id)}}">Print </a>
                                    <span id="label{{$amazon_destinations->amazon_destination_id}}">@if($amazon_destinations->shipping_label==1)<a href="javascript:void(0)" onclick="verifyshipment('{{$amazon_destinations->amazon_destination_id}}','2')">verify </a>@endif</span>
                                    @if($amazon_destinations->shipping_label==2)<a href="javascript:void(0)" onclick="verifyshipment('{{$amazon_destinations->amazon_destination_id}}','3')">Verify Shipment Load On Truck</a>@endif
                                    <span id="ship_load{{$amazon_destinations->amazon_destination_id}}" colspan="2" hidden><a href="javascript:void(0)" onclick="verifyshipment('{{$amazon_destinations->amazon_destination_id}}','3')">Verify Shipment Load On Truck</a></span><br>
                                    </span>
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                    @endif
                @endforeach
                {{--<tr id="label_tr">
                    <td></td>
                    <td id="print{{$shipments->shipment_id}}"><a href="{{url('warehouse/printshippinglabel/'.$shipments->shipment_id)}}">Print Shipping Label</a></td>
                    <td id="label{{$shipments->shipment_id}}">@if($shipments->shipping_label==1)<a href="javascript:void(0)" onclick="verifyshipment('{{$shipments->shipment_id}}','2')">verify Label</a>@endif</td>
                    <td colspan="2">@if($shipments->shipping_label==2)<a href="javascript:void(0)" onclick="verifyshipment('{{$shipments->shipment_id}}','3')">Verify Shipment Load On Truck</a>@endif</td>
                    <td id="ship_load{{$shipments->shipment_id}}" colspan="2" hidden><a href="javascript:void(0)" onclick="verifyshipment('{{$shipments->shipment_id}}','3')">Verify Shipment Load On Truck</a></td>
                </tr>--}}
                </tbody>
            </table>
        </div>
    </div>

@endforeach
