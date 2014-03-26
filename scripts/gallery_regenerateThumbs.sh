#!/bin/bash
# This script re-creates a thumb for each images in the gallery/category.
# The thumb has a width or height of 180 (the aspect ratio is mainteined.)

GALLERY_PATH="../gallery"
GALLERY_THUMBS="thumbs"
GALLERY_THUMB_SIZE=180


# iterate on all directories
for directory in "$GALLERY_PATH"/*
do
	directoryName=$(basename "$directory")
	echo "Creating thumbs for $directoryName"

	# remove old thumbs
	rm -rf "$directory/$GALLERY_THUMBS"
	mkdir "$directory/$GALLERY_THUMBS"

	# iterate on all files
	for image in "$GALLERY_PATH/$directory"/*
	do
		imageName=$(basename "$image")

		if [ -n "`expr match "$image" '.*\([Jj][Pp][Ee]\?[Gg]\)'`" ]
		then
			# Creates a temp image to work
			djpeg "$image" > tmpimg
			# Resizes the image
			pnmscale -xy $GALLERY_THUMB_SIZE $GALLERY_THUMB_SIZE tmpimg | cjpeg -smoo 2 -qual 80 > "$GALLERY_PATH/$directory/$GALLERY_THUMBS/$imageName"
		fi
	done

	# remove temp image
	rm tmpimg
done

