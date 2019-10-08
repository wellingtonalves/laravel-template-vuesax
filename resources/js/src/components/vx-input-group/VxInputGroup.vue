<template>
  <div class="vx-input-group flex">

    <!-- SLOT: PREPEND -->
    <div class="vx-input-group-prepend flex rounded-tl rounded-bl" :class="prependClasses" v-if="this.$slots.prepend">
      <slot name="prepend"></slot>
    </div>

    <!-- SLOT: DEFAULT -->
    <div class="vx-input-group-default flex-grow">
      <slot></slot>
    </div>

    <!-- SLOT: APPEND -->
    <div class="vx-input-group-append flex rounded-tr rounded-br" :class="appendClasses" v-if="this.$slots.append">
      <slot name="append"></slot>
    </div>
  </div>
</template>

<script>
export default {
  name: 'vx-input-group',
  props: {
    prependClasses: {
      type: String,
    },
    appendClasses: {
      type: String,
    }
  }
}
</script>

<style lang="scss">
@import "@sass/vuesax/components/vxInputGroup.scss";
</style>
