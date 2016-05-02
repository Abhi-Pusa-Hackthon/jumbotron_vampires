<!DOCTYPE html>
<html>
  <head>
    <?php include 'header.php';?>
  </head>
  <body>
    <div class="container" ng-app="myApp" ng-controller="myCtrl">
      <div class="row">
        <div class="col-sm-12" >
          <div class="col-sm-4 login_div"  ng-repeat="product in product_details">
            <div class="panel panel-default">
              <div class="panel-heading">
              	<img src={{product.img_url}} class="img-circle" alt="product_image"/>
              </div>
              <div class="panel-body">
                <table>
                   <tr>
                     <td>Product Name:</td><td>{{product.name}}</td>
                   </tr>
                   <tr>
                       <td>Product Company:</td><td>{{product.company}}</td>
                   </tr>
                   <tr>
                       <td>Market Price:</td><td>{{product.marketprice}}</td>
                   </tr>
                   <tr>
                      <td>Seller:</td><td>{{product.seller}}</td>
                   </tr>
                   <tr>
                      <td>Delivery Person</td><td>{{product.deliveryperson}}</td>
                   </tr>
                </table>
                <button name="button" ng-click="update_database()">Buy</button>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  </body>
</html>