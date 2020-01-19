<?php
$posts = [
  'post-1' => [
    'title' => 'My First Post',
    'links' => [
      'next' => 'post-2'
    ]
  ],
  'post-2' => [
    'title' => 'Post Number 2',
    'links' => [
      'prev' => 'post-1',
      'next' => 'post-3'
    ]
  ],
  'post-3' => [
    'title' => 'Another Post',
    'links' => [
      'prev' => 'post-2',
      'next' => 'post-4'
    ]
  ],
  'post-4' => [
    'title' => 'My Last Post',
    'links' => [
      'prev' => 'post-3'
    ]
  ]
];

if (isset($_GET['post'])) {
  $current = $posts[$_GET['post']];
} else {
  $current = $posts['post-1'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Blog</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="#">Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php foreach ($posts as $slug => $post) : ?>
          <li class="nav-item <?php if ($_GET['post'] === $slug) : ?> active <?php endif; ?>">
            <a class="nav-link" href="?post=<?php echo $slug; ?>"><?php echo $post['title']; ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </nav>
  <main class="d-flex flex-column h-100 py-5">
    <header class="header h-20 p-5">
      <h1 class="header-title display-1"><?php echo $current['title']; ?></h1>
    </header>
    <article class="flex-grow-1 p-5">

      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nisi repellendus quibusdam error quo cumque quasi quaerat fugiat, corporis reprehenderit quis alias accusantium, maxime harum consectetur minima ex sapiente consequuntur enim.</p>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, rem soluta corrupti temporibus, repudiandae laudantium eaque sed ipsam reprehenderit explicabo suscipit iure, ea earum. Accusantium voluptate possimus reiciendis animi iste?</p>
    </article>
    <footer class="align-self-center">
      <div class="page-nav">

        <?php if (isset($current['links']['prev'])) : ?>
          <a class="btn btn-outline-primary" href="?post=<?php echo $current['links']['prev']; ?>">
            &lt; Prev
          </a>
        <?php else : ?>
          <a class="btn btn-outline-primary disabled">&lt; Prev</a>
        <?php endif; ?>

        <?php if (isset($current['links']['next'])) : ?>
          <a class="btn btn-outline-primary" href="?post=<?php echo $current['links']['next']; ?>">
            Next &gt;
          </a>
        <?php else : ?>
          <a class="btn btn-outline-primary disabled">Next &gt;</a>
        <?php endif; ?>
      </div>
    </footer>

</body>

</html>