<template>
  <div>
    <ul style="top: 40px; position: fixed; margin: 0 auto">
      <router-link style="margin: 10px" to="/">Home</router-link
      >|
      <router-link style="margin: 10px" to="/about">About</router-link>
    </ul>
    <router-view />
  </div>
</template>
