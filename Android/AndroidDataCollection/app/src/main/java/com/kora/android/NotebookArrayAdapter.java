package com.kora.android;

import android.content.Context;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.support.annotation.NonNull;
import android.text.TextUtils;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import org.jetbrains.annotations.Contract;

import java.io.File;
import java.util.List;
import java.util.Map;

/**
 * Created for the Kora project by jon on 9/27/16.
 */

class NotebookArrayAdapter extends ArrayAdapter<Record> {

    //region Class Variables

    // The context for the adapter.
    private final Notebook context;

    // The data source for the adapter.
    private final List<Record> records;

    //endregion

    //region Initialization

    // Adapter's constructor.
    NotebookArrayAdapter(Notebook context, List<Record> values) {
        super(context, -1, values);
        this.context = context;
        this.records = values;
    }

    //endregion

    //region Adapter methods

    // Get and populate the adapter's list view row.
    @Override
    @NonNull public View getView(int position, View convertView, @NonNull ViewGroup parent) {

        ViewHolderItem viewHolder;

        if (convertView == null) {
            LayoutInflater inflater = (LayoutInflater) context
                    .getSystemService(Context.LAYOUT_INFLATER_SERVICE);

            // Use the custom notebook row layout.
            convertView = inflater.inflate(R.layout.notebook_row, parent, false);

            // Set up the view holder
            viewHolder = new ViewHolderItem();
            viewHolder.imageView = (ImageView) convertView.findViewById(R.id.icon);
            viewHolder.titleView = (TextView) convertView.findViewById(R.id.firstLine);
            viewHolder.dateLine = (TextView) convertView.findViewById(R.id.secondLine);
            viewHolder.thirdLine = (TextView) convertView.findViewById(R.id.thirdLine);

            convertView.setTag(viewHolder);
        } else {
            viewHolder = (ViewHolderItem) convertView.getTag();
        }

        // Get properties from the data source.
        Map<String, Object> props = records.get(position).props;

        // Get the current record type from the data source.
        String dt = props.get("datatype").toString();

        // If the photo path is not null or blank, get it and attempt to set the image view.
        String photoPath = records.get(position).photoPath;
        if (photoPath != null && !photoPath.equals("")) {
            File imgFile = new File(records.get(position).photoPath);

            if (imgFile.exists()) {
                setImageView(viewHolder.imageView, imgFile.getAbsolutePath());
            }
        } else {
            int resource;

            switch(dt) {
                case "meas":
                    resource = R.mipmap.meas_image;
                    break;
                case "note":
                    resource = R.mipmap.note_image;
                    break;
                case "photo":
                    resource = R.mipmap.photo_image;
                    break;
                default:
                    resource = R.drawable.ic_menu_camera;
            }

            viewHolder.imageView.setImageResource(resource);
        }

        // Fill the first line with the record's name.
        viewHolder.titleView.setText(props.get("name").toString());

        // fill the second line with the record's datetime
        viewHolder.dateLine.setText(props.get("datetime").toString());

        // fill the third line
        if (dt.equals("meas")) {
            String spec = props.get("species").toString();
            String val = props.get("value").toString();
            String uni = props.get("units").toString();
            viewHolder.thirdLine.setText(spec + ": " + val + " " + uni);
        } else {
            @SuppressWarnings("unchecked") List<String> tagsList = (List<String>) props.get("tags");
            viewHolder.thirdLine.setText(TextUtils.join(", ", tagsList));
        }

        return convertView;
    }

    //endregion

    //region View Holder

    /**
     * Caches the views in each row
     */
    private static class ViewHolderItem {
        ImageView imageView;
        TextView titleView;
        TextView dateLine;
        TextView thirdLine;
    }

    //endregion

    //region Helper Methods

    /**
     * Sets the image of the photo button
     */
    private void setImageView(ImageView imageView, String path) {
        String cacheKey = path.substring(path.lastIndexOf('/') + 1).
                replaceAll(".jpg","").
                replaceAll("_","");

        // First check the Bitmap cache
        final Bitmap cachedBitmap = ((KoraApplication) context.getApplicationContext())
                .getBitmapFromMemCache(cacheKey);

        if (cachedBitmap != null) {
            System.out.println("Bitmap size: (" + cachedBitmap.getWidth() + ", " + cachedBitmap.getHeight() + ")");
            imageView.setImageBitmap(cachedBitmap);
        } else {
            // First decode to check image dimensions
            final BitmapFactory.Options options = new BitmapFactory.Options();
            options.inJustDecodeBounds = true;
            BitmapFactory.decodeFile(path, options);

            // Calculate inSampleSize
            options.inSampleSize = calculateInSampleSize(options);

            // Decode bitmap with inSampleSize set
            options.inJustDecodeBounds = false;
            Bitmap loadedBitmap = BitmapFactory.decodeFile(path, options);
            ((KoraApplication) context.getApplicationContext())
                    .addBitmapToMemoryCache(cacheKey, loadedBitmap);

            if (loadedBitmap == null) {
                imageView.setImageResource(R.mipmap.photo_image);
            } else {
                imageView.setImageBitmap(loadedBitmap);
            }

        }
    }

    @Contract(pure = true)
    private static int calculateInSampleSize(BitmapFactory.Options options) {
        // Raw height and width of image
        final int height = options.outHeight;
        final int width = options.outWidth;
        int inSampleSize = 1;

        final int reqWidth = 89;
        final int reqHeight = 89;

        if (height > reqHeight || width > reqWidth) {

            final int halfHeight = height / 2;
            final int halfWidth = width / 2;

            // Calculate the largest inSampleSize value that is a power of 2 and keeps both
            // height and width larger than the requested height and width.
            while ((halfHeight / inSampleSize) >= reqHeight
                    && (halfWidth / inSampleSize) >= reqWidth) {
                inSampleSize *= 2;
            }
        }

        System.out.println("Resample factor: " + inSampleSize);
        System.out.println("Resampled size: " + "(" + width + ", " + height + ")");

        return inSampleSize;
    }

    //endregion
}