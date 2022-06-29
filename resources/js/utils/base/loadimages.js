
export function loadImages() {

    const path = require.context(
        "./../../../assets/static_images",false,/\.png$/);
      return path.keys().map(path);

}
