# M-M
M&amp;M_Carwash
      <?php foreach ($srv as $seen): ?>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
          <div class="price-item featured-item">
            
            <!-- Plan Header -->
            <div class="price-header">
              <h3><?php  echo htmlspecialchars($seen['service_name']); ?></h3>
              <h2>
                <span>$</span>
                <?php echo htmlspecialchars($seen['price']); ?>
              </h2>
            </div>

            <!-- Plan Body -->
            <div class="price-body">
              <?php echo htmlspecialchars($seen['description']); ?>
            </div>

            <!-- Plan Footer (Book Now Button) -->
            <div class="price-footer">
              <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'customer'): ?>
                <a class="btn btn-custom" 
                   data-bs-toggle="modal" 
                   data-bs-target="#myModal" 
                   data-plan="<?php echo htmlspecialchars($seen['plan_name']); ?>">
                   Book Now
                </a>
              <?php else: ?>
                <a class="btn btn-custom" 
                   onclick="logonfirst()" 
                   data-bs-toggle="modal" 
                   data-bs-target="#loginmodal">
                   Book Now
                </a>
              <?php endif; ?>
            </div>

          </div>
        </div>
      <?php endforeach; ?>