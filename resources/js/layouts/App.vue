<template>
  <div>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container">
        <inertia-link class="navbar-brand" href="/">Futsal Outdor Wawan</inertia-link>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
        </div>
      </div>
    </nav>
    
    <main class="container mt-5">
      <slot />
    </main>
  </div>
</template>

<script>
  export default {

  }
</script>

<style scoped>
    .mt-5 {
      margin-top: 100px!important;
    }
</style>