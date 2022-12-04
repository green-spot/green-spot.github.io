<nav>
  <div class="get-started">
    <a href="/accela/#get-started">Get started</a>
  </div>

  <ul>
    <li><a href="/accela/"<?php if(el($props, "current-slug") === null) echo ' class="current"'; ?>>Accelaとは</a></li>
    <?php foreach(get_titles() as $slug => $set): ?>
    <li class="<?php echo $set[1]; ?>">
      <?php if(el($props, "current-slug") === $slug): ?>
      <a href="/accela/<?php echo $slug; ?>/" class="current"><?php echo $set[0]; ?></a>
      <?php else: ?>
      <a href="/accela/<?php echo $slug; ?>/"><?php echo $set[0]; ?></a></li>
      <?php endif; ?>
    </li>
    <?php endforeach; ?>
  </ul>
</nav>
