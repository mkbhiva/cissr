

<div class="col-lg-3">
              <aside class="sidebar">
                <div class="filters vollist">

                  <h4 class="mb-3">Published Issues</h4>
                  <ul class="nav nav-listt flex-column mb-5">
                    <?php
                      foreach ($query_volume->result() as $row) {

                    ?>
                    <li>
                      <a href="<?= site_url('researches/volumes/'.$row->volUrl) ?>">
                          <h6><?= $row->volumeNo.', '.$row->issueNo; ?></h6>
                      </a>
                    </li>
                    <?php } ?>
                  </ul>
				

                </div>

                

              </aside>
            </div>