<!DOCTYPE html>
<html lang="en">
    <!--All Products Stock Report Header-->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>All Products Report | Admin | Easy Shoppy</title>
    </head>
    <!--All Products Stock Report Body-->
    <body>
        <!--Products Report Show-->
        <h3 style="text-align: center;">Products Report</h3>
        <hr class="divide-gray-700" style="border: 1px solid"/>
        <div style="width: 100% !important; overflow-x: scroll">
            <table border="1" cellspacing="0" cellpadding="0" style="width: 100%; text-align: center;">
                <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Stock</th>
                        <th>Reg. Price</th>
                        <th>Disc. Price</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!--All Products Stock Show-->
                    @foreach($products as $key=>$product)
                    <tr>
                        <td style="padding-left: 10px; padding-right: 10px;">{{++$key}}</td>
                        <td><img src="{{ asset('assets/images/products') }}/{{ $product->image }}" width="60" height="60" /></td>
                        <td style="padding-left: 10px; padding-right: 10px;">{{ $product->name }}</td>
                        <td style="padding-left: 10px; padding-right: 10px;">
                            @if($product->quantity >= 1)
                                <span class="badge badge-success" style="background-color: green; color: white;">Available</span>
                            @else
                                <span class="badge badge-danger" style="background-color: red; color: white;">Stock Out</span>
                            @endif
                        </td>
                        <td style="padding-left: 10px; padding-right: 10px;">{{$setting->currency}}{{$product->regular_price}}</td>
                        <td style="padding-left: 10px; padding-right: 10px;">{{$setting->currency}}{{$product->discounted_price}}</td>
                        <td style="padding-left: 10px; padding-right: 10px;">
                            @if($product->status == 1)
                                <span class="badge badge-success" style="background-color: green; color: white;">Active</span>
                            @else
                                <span class="badge badge-danger" style="background-color: red; color: white;">Inactive</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
