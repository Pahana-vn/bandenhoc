<div style="border: 3px solid green;padding: 10px">
    <h3>Hi {{ $order->$account->name }}</h3>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, voluptate tempora? Nobis qui corporis sit assumenda distinctio consequuntur neque facilis consequatur quisquam repellat velit, ipsa excepturi maiores hic dolor culpa!</p>
    <h4>Your order detail</h4>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>STT</th>
            <th>Product name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Sub Total</th>
        </tr>
        @foreach ($order->details as $detail )
        <tr>
            <th> {{$loop->index + 1}} </th>
            <th> {{$detail->product->name}} </th>
            <th>{{$detail->price}}</th>
            <th>{{$detail->quantity}}</th>
            <th> {{number_format($detail->price * $detail->quantity)}} </th>
        </tr>
        @endforeach

    </table>
    <p>
        <a href="{{route('fe.verify')}}" style="display: inline-block; padding: 7px 25px;color: white;background: blue">Click here to verify</a>
    </p>
</div>
