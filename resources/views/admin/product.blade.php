<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style type="text/css">
       /* Container for centering the form */
.div_center {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding-top: 40px;
    width: 80%; /* Set to 80% of the viewport width */
    max-width: 1200px; /* Limit the max width */
    height: auto; /* Allow height to adjust automatically */
    margin: 0 auto; /* Center the container */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding-bottom: 20px;
    box-sizing: border-box;
}

/* Heading styling */
.font_size {
    font-size: 40px;
    padding-bottom: 20px;
    text-align: center;
}

/* Input field styling */
.p_n {
    color: black;
    padding-bottom: 20px;
    width: 100%; /* Full width of the container */
    height: 40px;
    padding: 10px;
    box-sizing: border-box;
    flex-grow: 1;
}

.p_n1 {
    color: black;
    padding-bottom: 20px;
    width: 100%; /* Full width for textarea */
    height: 100px; /* Slightly increased height for textarea */
    padding: 10px;
    resize: vertical;
    box-sizing: border-box;
    flex-grow: 2;
}

/* Label styling */
label {
    display: inline-block;
    width: 45%; /* Reduced width to allow wider input fields */
    padding-right: 10px;
    text-align: left;
    vertical-align: top;
}

/* Container for each form field */
.div_design {
    padding-bottom: 20px;
    width: 100%; /* Full width of parent */
    display: inline-flex;
    align-items: center;
}

.btn-primary{
    color: black;
    padding-bottom: 20px;
    width: 100%; /* Full width of the container */
    height: 40px;
    padding: 10px;
    box-sizing: border-box;
    flex-grow: 1;

}

/* Media query for smaller screens */
@media (max-width: 768px) {
    .div_center {
        width: 100%; /* Full width on smaller screens */
        max-width: none; /* No max-width on small screens */
        height: auto;
    }
    label {
        width: 100%; /* Stack labels on top of inputs */
        display: block;
        margin-bottom: 5px;
        text-align: left;
    }
    .p_n, .p_n1 {
        width: 100%; /* Full width for inputs */
    }
    .div_design {
        flex-direction: column; /* Stack label and input vertically */
        align-items: flex-start;
    }
}

    </style>
</head>
<body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.header')

        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
                @endif
                <h1 class="font_size">ADD PRODUCT</h1>
                <div class="div_center">
                    <form action="{{ url('/add_product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label>Product Category</label>
                            <select class="p_n" name="category" required="">
                                <option value="" selected="">Select Category</option>
                                @foreach($category as $category)
                                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="div_design">
                            <label>Product Name</label>
                            <input class="p_n" type="text" name="product_name" placeholder="Product Name" required="">
                        </div>
                        <div class="div_design">
                            <label>Product Description</label>
                            <textarea class="p_n1" name="description" placeholder="Description" required="" rows="5"></textarea>
                        </div>
                        <div class="div_design">
                            <label>Product Price</label>
                            <input class="p_n" type="number" name="price" placeholder="Price" required="">
                        </div>
                        <div class="div_design">
                            <label>Product Quantity</label>
                            <input class="p_n" type="number" min="0" name="quantity" placeholder="Quantity" required="">
                        </div>
                        <div class="div_design">
                            <label>Product Image</label>
                            <input type="file" name="image" required="">
                        </div>
                        <div class="p_n">
                            <input type="submit" value="Add Product" class="btn btn-primary" style="align-items: center;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('admin.script')
</body>
</html>
