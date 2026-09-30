const router = require("express").Router();
const multer = require("multer");
const cloudinary = require("cloudinary").v2;
const { protect, admin } = require("../middleware/auth");

cloudinary.config({
  cloud_name: process.env.CLOUDINARY_CLOUD_NAME,
  api_key: process.env.CLOUDINARY_API_KEY,
  api_secret: process.env.CLOUDINARY_API_SECRET,
});

const upload = multer({
  storage: multer.memoryStorage(),
  limits: { fileSize: 5 * 1024 * 1024 }, // 5 MB
  fileFilter: (req, file, cb) =>
    file.mimetype.startsWith("image/") ? cb(null, true) : cb(new Error("Only images allowed")),
});

router.post("/", protect, admin, upload.single("image"), (req, res, next) => {
  if (!req.file) {
    res.status(400);
    return next(new Error("No image uploaded"));
  }
  cloudinary.uploader
    .upload_stream({ folder: "fitpop" }, (err, result) => {
      if (err) return next(err);
      res.json({ url: result.secure_url });
    })
    .end(req.file.buffer);
});

module.exports = router;