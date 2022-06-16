<template>
  <div>
    <loader
      object="#f90101"
      color1="#ffffff"
      color2="#001ba3"
      size="10"
      speed="2"
      bg="#00040f"
      objectbg="#faa805"
      opacity="80"
      disableScrolling="true"
      :name="loadertype"
    ></loader>
  </div>
</template>

<script>
export default {
    props:['loadertype']
}
</script>
