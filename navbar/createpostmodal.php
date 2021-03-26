<!-- CREATE POST MODAL CODE, this is the code we include on every page that has the "Create Post" option -->

<div class="modal fade" id="createPost" tabindex="-1" role="dialog" aria-labelledby="PostTitle" aria-hidden="false">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Create New Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <form class="p-3name" id="createNewPost" name="createPost" action="connect.php" method="post" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="title">Your Name:</label>
                <input type="text" class="form-control" id="userName" value="<?=$_SESSION['login']['username']?>" name="userName" placeholder="Enter Name" required>
              </div>
              <div class="form-group col-md-6">
                <label for="setprice">Phone Number:</label>
                <input type="text" class="form-control" id="phone" value="<?=$_SESSION['login']['phone']?>" name="phone" placeholder="Ex. 555-555-5555" required>
              </div>
              <div class="form-group col-md-12">
                <label for="setprice">Email:</label>
                <input type="text" class="form-control" id="email" value="<?=$_SESSION['login']['email']?>" name="email" placeholder="Ex. maarkt@gmail.com" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="title">Item Name:</label>
                <input type="text" class="form-control" id="postTitle" name="title" placeholder="Title..." required>
              </div>
              <div class="form-group col-md-6">
                <label for="setprice">Price:</label>
                <input type="text" class="form-control" id="setprice" name="price" placeholder="Set a price for your item" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="category">Category: </label>
                <select id="category" name="category" class="custom-select custom-select-sm">
                  <option value="Other">Other</option>
                  <option value="Textbooks">Textbooks</option>
                  <option value="Clothing">Clothing</option>
                  <option value="Electronics">Electronics</option>
                  <option value="Video Games">Video Games</option>
                  <option value="Sports & Outdoors">Sports & Outdoors</option>
                  <option value="Music">Music</option>
                  <option value="Automotive">Automotive</option>
                  <option value="Furniture">Furniture</option>
                </select>
              </div>

              <div class="form-group col-md-6">
                <div id="if1">
                  <label for="1-condition">Item Condition: </label>
                  <select id="1-condition" name="1-condition" class="custom-select custom-select-sm">
                    <option value="Brand New">Brand New</option>
                    <option value="Like New">Like New</option>
                    <option value="Very Good">Very Good</option>
                    <option value="Good">Good</option>
                    <option value="Acceptable">Acceptable</option>
                  </select>
                </div>

                <div id="if2">
                  <label for="2-condition">Item Condition: </label>
                  <select id="2-condition" name="2-condition" class="custom-select custom-select-sm">
                    <option value="New">New</option>
                    <option value="Open-Box">Open-Box</option>
                    <option value="Refurbished">Refurbished</option>
                    <option value="Used">Used</option>
                    <option value="Not Working">Not Working</option>
                  </select>
                </div>

                <div id="if3">
                  <label for="3-condition">Item Condition: </label>
                  <select id="3-condition" name="3-condition" class="custom-select custom-select-sm">
                    <option value="New With Tag">New With Tag</option>
                    <option value="New Without Tag">New Without Tag</option>
                    <option value="New With Defects">New With Defects</option>
                    <option value="Pre-Owned">Pre-Owned</option>
                  </select>
                </div>

                <div id="if4">
                  <label for="4-condition">Item Condition: </label>
                  <select id="motor-condition" name="4-condition" class="custom-select custom-select-sm">
                    <option value="New">New</option>
                    <option value="Certified New">Certified New</option>
                    <option value="Pre-Owned">Pre-Owned</option>
                  </select>
                </div>

                <div id="ifOther">
                  <label for="other-condition">Item Condition: </label>
                  <select id="others-condition" name="condition" class="custom-select custom-select-sm">
                    <option value="New">New</option>
                    <option value="Used">Used</option>
                  </select>
                </div>
              </div>
            </div>
        </div>

        <label for="textdes">Description</label>
        <textarea class="form-control" id="descr" rows="5" name="textdes" placeholder="Add more description (if needed)"></textarea>
        
        <br>
          <label for="inputGroupFile01">Upload Image</label>
          <div class="custom-file">
            <input type="file" id="item-file" name="image" required>
          </div>
                  
      </div>
      <div class="form-group row">
        <div class="col-6 col-md-5"></div>
        <div class="col-6 col-md-6">
          <button type="submit" class="btn btn-info">Submit</button>
        </div>
      </div>
      </form>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>