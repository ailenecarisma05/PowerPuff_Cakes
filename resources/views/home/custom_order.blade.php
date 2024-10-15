<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Custom Cake Order Form</title>
  <link rel="stylesheet" href="{{ asset('home/css/custom.css') }}">
  <script src="https://kit.fontawesome.com/7375c99873.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="button-container">
      <a href="{{ url('custom_order') }}" class="custom-button">Custom Cake Order Form</a>
      <a href="{{ url('mycustom_order') }}" class="custom-button">Your Customized Order</a>
    </div>
  <div class="container">
    
  @if(session()->has('message'))
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> x</button>
            {{ session()->get('message') }}
            </div>
         @endif
    <div class="back-arrow">
        <a href="{{ url('all_products') }}"><i class="fa-solid fa-chevron-left"></i></a>
    </div>
        
    <h1>Custom Cake Order Form</h1>
    <div class="banner">
      <img src="{{ asset('home/images/custombanner.png') }}" alt="Custom Cake Banner" />
    </div>
    <form action="{{ url('store_custom_order') }}" method="POST" enctype="multipart/form-data">
        @csrf
    
        <div class="form-content">
            <div class="left-column">
              <label for="cake-flavor">Choose a Cake Flavor:</label>
              <select id="cake-flavor" name="cake-flavor" required style="padding-bottom: 10px;">
                <option value="" disabled selected>Select Flavor</option>
                <option value="choco-moist">Chocolate Moist</option>
                <option value="white-choco">White Chocolate</option>
                <option value="red-velvet">Red Velvet</option>
                <option value="vanilla">Vanilla</option>
                <option value="coffee-mocha">Coffee Mocha</option>
                <option value="strawberry">Strawberry Delight</option>
                <option value="ube">Ube (Purple Yam)</option>
              </select>
          
              <label for="cake-filling" style="padding-top: 10px;">Choose the Filling:</label>
              <select id="cake-filling" name="cake-filling" required>
                <option value="" disabled selected>Select Filling</option>
                <option value="chocolate">Chocolate</option>
                <option value="cream-cheese">Cream Cheese</option>
                <option value="vanilla">Vanilla</option>
                <option value="butter-cream">Butter Cream</option>
                <option value="strawberry">Strawberry</option>
                <option value="mocha-butter">Mocha Butter Cream</option>
                <option value="leche-flan">Leche Flan</option>
              </select>
          
              <label for="cake-icing">Choose the Icing:</label>
              <select id="cake-icing" name="cake-icing" required>
                <option value="" disabled selected>Select Icing</option>
                <option value="fondant">Fondant</option>
                <option value="icing">Butter Cream</option>
                <option value="icing">Vanilla</option>
                <option value="icing">Cream Cheese</option>
                <option value="icing">Chocolate</option>
                <option value="icing">Ube</option>
              </select>

              <label for="tiers">Number of Tiers:</label>
              <select id="tiers" name="tiers" required>
                <option value="" disabled selected>Select Number of Tiers</option>
                <option value="1">1 Tier</option>
                <option value="2">2 Tiers</option>
                <option value="3">3 Tiers</option>
                <option value="4">4 Tiers</option>
                <option value="5">5 Tiers</option>
                <option value="6">6 Tiers</option>
              </select>
          
              <label for="cake-shape">Cake Shape:</label>
              <div class="cake-sizes">
                <select id="cake-shape" name="cake-shape" required>
                  <option value="" disabled selected>Select Shape</option>
                  <option value="square">Square</option>
                  <option value="circle">Circle</option>
                  <option value="rectangle">Rectangle</option>
                </select>
          
                <select id="cake-size-width" name="cake-size-width" required>
                  <option value="" disabled selected>Select Size Width</option>
                  <option value="4">4"</option>
                  <option value="6">6"</option>
                  <option value="8">8"</option>
                  <option value="10">10"</option>
                  <option value="12">12"</option>
                  <option value="14">14"</option>
              </select>

              <select id="cake-size-height" name="cake-size-height" required>
                  <option value="" disabled selected>Select Size Height</option>
                  <option value="5">5"</option>
                  <option value="6">6"</option>
                  <option value="7">7"</option>
                  <option value="8">8"</option>
                  <option value="9">9"</option>
                  <option value="10">10"</option>
                  <option value="11">11"</option>
              </select>

              </div>
          
              <label for="theme">Theme of Cake:</label>
              <input type="text" id="theme" name="theme" placeholder="e.g. Cartoon, Futuristic">
          
              <label for="cupcakes">Cupcakes (optional):</label>
              <input type="number" id="cupcakes" name="cupcakes" placeholder="e.g. 24">
          
              <div class="candles">
                <label for="candles">Candles (FOC)</label>
                <select id="candles" name="candles" required>
                    <option value="" disabled selected>Select Option</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
                <label for="candle-numbers" style="font-size: 12px;">Number of Candles</label>
                <input type="number" id="candle-numbers" name="candle-numbers" value="1" min="1" style="width: 80px; margin-top: 15px;" required>
              </div>
          
              <label for="pickup-delivery">Pick Up/Delivery:</label>
              <select id="pickup-delivery" name="pickup-delivery" required>
                <option value="" disabled selected>Select Option</option>
                <option value="pickup">Pick Up: ₱ 0.00</option>
                <option value="delivery">Deliver: ₱100.00</option>
              </select>
            </div>
          
            <div class="right-column">
                <p style="text-align: center; padding-bottom:5px;">Upload a picture of the style of cake you are after,
                 which will be included in your message to us</p>
               
                 <label>Add Image 1:</label>
                <input type="file" name="image1" id="image1" accept="image/*">
                <img id="image1-preview" src="" alt="Preview of image 1" style="max-width: 100px; display: none;">

                <label>Add Image 2:</label>
                <input type="file" name="image2" id="image2" accept="image/*">
                <img id="image2-preview" src="" alt="Preview of image 2" style="max-width: 100px; display: none;">

                <label>Add Image 3:</label>
                <input type="file" name="image3" id="image3" accept="image/*">
                <img id="image3-preview" src="" alt="Preview of image 3" style="max-width: 100px; display: none;">

                <label for="additional-info">Additional Information:</label>
                <textarea id="additional-info" name="additional-info" rows="4" placeholder="Enter additional instructions"></textarea>
          
                <label for="card-message">Card Message:</label>
                <textarea id="card-message" name="card-message" rows="2" placeholder="Message on the card (optional)"></textarea>

                <label for="delivery_time">Delivery Time:</label>
                <input type="time" id="delivery_time" name="delivery_time" required>

              <label for="delivery-date">Delivery Date:</label>
              <input type="date" id="delivery-date" name="delivery-date" required>
          
              <label for="design-suggestions" style="text-align: center;">Would you like me to make additional design suggestions based on your theme?</label>
              <div class="design-suggestions">
                <input type="radio" id="yes" name="design-suggestions" value="yes">
                <label for="yes">Yes</label>
                <input type="radio" id="no" name="design-suggestions" value="no">
                <label for="no">No</label>
              </div>

              
              <input type="hidden" id="total-amount" name="totalAmount" value="0">
              <aside class="col-lg-12" style="padding: 20px; padding-bottom: 20px;">
                <div class="summary summary-cart">
                    <h3 class="summary-title" style="font-weight:bold;">Cart Total</h3>
                    <div style="border-top: 1px solid #000; margin: 5px 0;"></div>
                    <table class="table table-summary">
                        <tbody>
                            <tr class="summary-subtotal">
                                <td style="font-weight:bold;">Subtotal:</td>
                                <td id="subtotal" style="text-align: right; padding-left:165px;">₱0.00</td>
                            </tr>
                            <tr class="summary-total">
                                <td style="font-weight:bold;">Total:</td>
                                <td id="total" style="text-align: right;">₱0.00</td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- End .table table-summary -->
                </div>
            </aside>

            </div>
          </div>
      <!-- Buttons -->
        <div class="form-buttons">
          <button type="reset">Clear Form</button>
          
            <button type="submit">Placed Order Form</button>
          <button type="button" onclick="window.print()">Print Form</button>
        </div>
    </form>
    

  </div>
  
  <script src="{{ asset('home/js/custom.js') }}"></script>
  <script>
    // Pricing for tiers and icing
    const tierPrices = {1: 899, 2: 2599, 3: 5000, 4: 10500, 5: 16800, 6: 19899};
    const icingPrices = {'fondant': 399, 
                         'icing': 150, 
                         };
    const deliveryPrices = {'pickup': 0, 'delivery': 100};

   

    // Function to update the cart total
    // Function to update the cart total
      function updateCartTotal() {
          const tiers = document.getElementById('tiers').value;
          const icing = document.getElementById('cake-icing').value;
          const delivery = document.getElementById('pickup-delivery').value;

          let subtotal = 0;

          // Add tier price
          if (tiers && tierPrices[tiers]) {
              subtotal += tierPrices[tiers];
          }

          // Add icing price
          if (icing && icingPrices[icing]) {
              subtotal += icingPrices[icing];
          }

          // Add delivery price
          if (delivery && deliveryPrices[delivery]) {
              subtotal += deliveryPrices[delivery];
          }

          // Update the subtotal and total in the cart
          document.getElementById('subtotal').textContent = `₱${subtotal.toLocaleString()}.00`;
          document.getElementById('total').textContent = `₱${subtotal.toLocaleString()}.00`;

          // Update the hidden input field for total amount
          document.getElementById('total-amount').value = subtotal; // Set the hidden field value
      }

      // Event listeners for form changes
      document.getElementById('tiers').addEventListener('change', updateCartTotal);
      document.getElementById('cake-icing').addEventListener('change', updateCartTotal);
      document.getElementById('pickup-delivery').addEventListener('change', updateCartTotal);

  </script>
  <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
      <!-- popper js -->
      <script src="{{ asset('home/js/popper.min.js') }}"></script>
      <!-- bootstrap js -->
      <script src="{{ asset('home/js/bootstrap.js') }}"></script>
      <!-- custom js -->
      <script src="{{ asset('home/js/custom.js') }}"></script>
</body>
</html>
