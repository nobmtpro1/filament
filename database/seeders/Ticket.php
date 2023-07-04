<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Ticket extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('tickets')->truncate();

        for ($i = 1; $i < 5; $i++) {
            DB::unprepared("INSERT INTO `tickets` (`examiner_type`,`id`, `type`, `image`, `name`, `date`, `from`, `to`, `quantity`, `address`, `price`, `link_video`,  `examiner`, `overview`, `is_active`, `created_at`, `updated_at`) VALUES
            ('Juries',$i, 0, '/storage/image/uKR0q71dB0pCTWPnf9bW8KmZrXWbapE2rcGuYqnX.jpg', 'Hạng mục Film & Integrated', '2022-03-18', '08:30:00', '11:30:00', NULL, 'www.bookticket.com', 399000, 'https://www.youtube.com/embed/IsNYctPeZNg', '[{\"name\":\"Lorem ipsum dolor sit amet,\",\"avatar\":\"\\/storage\\/image\\/EBDaR9jjoMlIYXVEil88bAnmmt6fQxxJIIjbtNZL.png\",\"description\":\"consectetur adipiscing elit.\"},{\"name\":\"Lorem ipsum dolor sit amet,\",\"avatar\":\"\\/storage\\/image\\/5kR60KGa2ct0u6xvh8ldhQiEIvpTpNXXQ7j2fVTd.png\",\"description\":\"consectetur adipiscing elit.\"},{\"name\":\"Lorem ipsum dolor sit amet,\",\"avatar\":\"\\/storage\\/image\\/Tvb4SiXDJWoTwCDhenXTmR4LcfQlRzBDz7IuXHQw.png\",\"description\":\"consectetur adipiscing elit.\"},{\"name\":\"Lorem ipsum dolor sit amet,\",\"avatar\":\"\\/storage\\/image\\/w1seeZ0pntPYdZUxf3okEweIQFG4juNfRVUyAZmO.png\",\"description\":\"consectetur adipiscing elit.\"}]', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ultricies enim et, lorem eget elementum ultrices. Ornare neque massa, id elit, venenatis nec interdum. Neque ipsum amet leo mi nullam vulputate. Pretium arcu feugiat magna Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ultricies enim et, lorem eget elementum ultrices. Ornare neque massa, id elit, venenatis nec interdum. Neque ipsum amet leo mi nullam vulputate. Pretium arcu feugiat magna', 1, '2022-03-17 12:34:26', '2022-03-21 11:01:05'),
            ('Juries',$i + 4, 1, '/storage/image/whjg4S0O9VWPgDu6mEbnx0UODO1GpuWJGRR6tw5n.jpg', 'Hạng mục Film & Integrated', '2022-03-18', '09:30:00', '11:35:00', 250, 'www.bookticket.com', 399000, 'https://www.youtube.com/embed/IsNYctPeZNg', NULL, NULL, 1, '2022-03-17 12:35:52', '2022-03-17 12:35:52');");
        }

        Schema::enableForeignKeyConstraints();
    }
}
