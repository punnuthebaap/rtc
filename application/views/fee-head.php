<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-currency-inr"></i>
                </span> <?php echo $title; ?>
              </h3>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Fee Head Form</h4>
                    <p class="card-description"> Enter new fee head details below : </p>
                    <form class="forms-sample">
                      <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Fee ID</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="exampleInputMobile" placeholder="Fee Id">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Fee Head</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="exampleInputPassword2" placeholder="Fee Head">
                        </div>
                      </div>
                      <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Type</label>
                            <div class="col-sm-9">
                              <select class="form-control">
                                <option>Yearly</option>
                                <option>Monthly</option>
                              </select>
                            </div>
                          </div>
                      <button type="submit" class="btn btn-gradient-primary me-2">Add</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
          </div>
          <!-- content-wrapper ends -->