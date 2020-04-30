const fs = require('fs');
const path = require('path');
const archiver = require('archiver');

const output = fs.createWriteStream(__dirname + '../../../dist/ficticious.zip');
const archive = archiver('zip', {
    zlib: {level: 9}
});

output.on('close', function () {
    console.log(archive.pointer() + ' total bytes');
    console.log('archiver has been finalized and the output file descriptor has closed.');
});

output.on('end', function () {
    console.log('Data has been drained');
});

archive.on('error', function (err) {
    throw err;
});

archive.pipe(output);

const projectRoot = path.resolve(__dirname, './../../');
console.log(`Project root is ${projectRoot}`);

const screenshot = path.resolve(projectRoot, 'screenshot.png');
console.log(screenshot);
archive.file(screenshot, {name: 'screenshot.png'});

const themeInfoStylesheet = path.resolve(projectRoot, 'style.css');
archive.file(themeInfoStylesheet, {name: 'style.css'});

const resources = path.resolve(projectRoot, 'resources')
console.log(resources);
archive.directory(resources, 'resources', null);

const phpFiles = [
    'archive.php',
    'archive-experiment.php',
    'class-wp-bootstrap-navwalker.php',
    'comments.php',
    'footer.php',
    'front-page.php',
    'functions.php',
    'header.php',
    'index.php',
    'page.php',
    'single.php',
    'single-experiment.php',
    'template-parts/front-page/blog.php',
    'template-parts/front-page/experiment.php',
    'template-parts/contact-form.php',
    'themeFeatures/customize.php',
    'themeFeatures/post-types.php',
    'themeFeatures/utilities.php',
    'themeFeatures/variables.php'
];

phpFiles.forEach(phpFile => {
    archive.file(path.resolve(projectRoot, phpFile), {name: phpFile});
})

archive.finalize();